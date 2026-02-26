<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JigsawStackTranslationService
{
    private string $translateUrl;
    private ?string $apiKey;

    public function __construct()
    {
        $this->translateUrl = config('services.jigsawstack.translate_url');
        $this->apiKey = config('services.jigsawstack.key');
    }

    public function translate(string $text, string $currentLanguage, string $targetLanguage): ?string
    {
        if (!$this->apiKey) {
            Log::error('JigsawStack API Error', ['message' => 'API key not set']);
            return null;
        }

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => $this->apiKey,
            ])->post($this->translateUrl, [
                'current_language' => $currentLanguage,
                'target_language' => $targetLanguage,
                'text' => $text,
            ]);

            if ($response->successful() && isset($response->json()['translated_text'])) {
                return $response->json()['translated_text'];
            }

            Log::error('JigsawStack API Error', [
                'status' => $response->status(),
                'message' => $response->json()['message'] ?? 'Unknown error',
            ]);

            return null;
        } catch (\Throwable $exception) {
            Log::error('JigsawStack API Exception', [
                'message' => $exception->getMessage(),
            ]);

            return null;
        }
    }

    public function translateBatch(array $keywords, string $sourceLanguage, array $targetLanguages): array
    {
        $translations = [];

        foreach ($keywords as $keyword) {
            $translations[$keyword] = [];

            foreach ($targetLanguages as $language) {
                $translations[$keyword][$language] =
                    $this->translate($keyword, $sourceLanguage, $language)
                    ?? sprintf('[%s] %s', $language, $keyword);
            }
        }

        return $translations;
    }
}
