<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class JigsawStackTranslationService
{
    protected $client;
    protected $translateUrl = 'https://api.jigsawstack.com/v1/ai/translate';
    protected $transliterateUrl = 'https://api.jigsawstack.com/v1/ai/transliterate';
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => 'D:\xampp\apache\bin\curl-ca-bundle.crt'
        ]);
        $this->apiKey = env('JIGSAW_STACK_API_KEY');
    }

    public function translate(string $text, string $currentLanguage, string $targetLanguage): ?string
    {
        try {
            $response = $this->client->post($this->translateUrl, [
                'headers' => [
                    'x-api-key' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'current_language' => $currentLanguage,
                    'target_language' => $targetLanguage,
                    'text' => $text,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody()->getContents(), true);
                return $responseData['translated_text'] ?? null;
            } else {
                Log::error('Translation API returned status code: ' . $response->getStatusCode());
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                Log::error('Translation API request failed with status ' . $statusCode . ': ' . $e->getMessage());
            } else {
                Log::error('Translation API request failed: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('Translation API request failed: ' . $e->getMessage());
        }

        return null;
    }

    public function transliterate(string $text, string $targetLanguage): ?string
    {
        try {
            $response = $this->client->get($this->transliterateUrl, [
                'headers' => [
                    'x-api-key' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'text' => $text,
                    'target' => $targetLanguage,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody()->getContents(), true);
                return $responseData['transliteratedText'] ?? null;
            } else {
                Log::error('Transliteration API returned status code: ' . $response->getStatusCode());
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                Log::error('Transliteration API request failed with status ' . $statusCode . ': ' . $e->getMessage());
            } else {
                Log::error('Transliteration API request failed: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('Transliteration API request failed: ' . $e->getMessage());
        }

        return null;
    }
}
