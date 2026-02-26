<?php

namespace App\Http\Controllers;

use App\Services\JigsawStackTranslationService;

class JigsawStackTranslationController extends Controller
{
    public function __construct(private readonly JigsawStackTranslationService $translationService)
    {
    }

    public function index()
    {
        $keywords = ['Document', 'File', 'Project', 'User', 'Permissions', 'Account'];
        $languages = ['fr', 'es', 'de', 'ar'];

        $translations = $this->translationService->translateBatch($keywords, 'en', $languages);

        return view('welcome', compact('keywords', 'languages', 'translations'));
    }
}
