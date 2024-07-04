<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JigsawStackTranslationController extends Controller
{
    public function index()
    {
        $keywords = ['Document', 'File', 'Project', 'User', 'Permissions', 'Account'];
        
        $languages = ['fr', 'es', 'de', 'ar'];

        $translations = $this->getTranslations($keywords, $languages);

        return view('welcome', compact('keywords', 'languages', 'translations'));
    }

    private function getTranslations($keywords, $languages)
    {
        $translations = [];

        foreach ($keywords as $keyword) {
            $translations[$keyword] = [];

            foreach ($languages as $language) {
                $translations[$keyword][$language] = $this->translateText('en', $language, $keyword);
            }
        }

        return $translations;
    }

    private function translateText($currentLanguage, $targetLanguage, $text)
    {
        try {
            $apiKey = env('JIGSAWSTACK_API_KEY');
            if (!$apiKey) {
                Log::error('JigsawStack API Error', ['message' => 'API key not set']);
                return 'Translation error: API key not set';
            }

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'x-api-key' => $apiKey,
            ])->post('https://api.jigsawstack.com/v1/ai/translate', [
                'current_language' => $currentLanguage,
                'target_language' => $targetLanguage,
                'text' => $text,
            ]);

            if ($response->successful() && isset($response->json()['translated_text'])) {
                return $response->json()['translated_text'];
            } else {
                Log::error('JigsawStack API Error', [
                    'status' => $response->status(),
                    'message' => $response->json()['message'] ?? 'Unknown error',
                ]);
                return 'Translation error: ' . $response->status();
            }
        } catch (\Exception $e) {
            Log::error('JigsawStack API Exception', [
                'message' => $e->getMessage(),
            ]);
            return 'Translation exception: ' . $e->getMessage();
        }
    }
}
