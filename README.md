# ApiTranslation

A Laravel demo project for translating UI keywords from English to multiple target languages using the JigsawStack Translate API.

## Features

- Multi-language translation table rendered in Blade.
- Reusable `JigsawStackTranslationService` with:
  - single-item translation (`translate`)
  - batch translation (`translateBatch`)
- Config-driven API credentials through `config/services.php`.

## Setup

1. Install dependencies:
   ```bash
   composer install
   ```
2. Copy env file and generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Add your JigsawStack API key to `.env`:
   ```env
   JIGSAWSTACK_API_KEY=your_api_key
   ```
4. Run the app:
   ```bash
   php artisan serve
   ```
5. Visit `http://127.0.0.1:8000`.

## Reusing in Future Projects

To add multilingual translation quickly in another Laravel project:

1. Copy `app/Services/JigsawStackTranslationService.php`.
2. Add this block to `config/services.php`:
   ```php
   'jigsawstack' => [
       'key' => env('JIGSAWSTACK_API_KEY'),
       'translate_url' => env('JIGSAWSTACK_TRANSLATE_URL', 'https://api.jigsawstack.com/v1/ai/translate'),
   ],
   ```
3. Add `JIGSAWSTACK_API_KEY` to the new project's `.env`.
4. Inject the service into your controller:
   ```php
   public function __construct(private readonly JigsawStackTranslationService $translationService)
   {
   }
   ```
5. Use batch translation for your labels:
   ```php
   $translations = $this->translationService->translateBatch($keywords, 'en', ['fr', 'es', 'de', 'ar']);
   ```
6. Render results dynamically in Blade using nested `@foreach` loops.

## Notes

- If the API is unavailable, the service returns a safe fallback format (`[lang] keyword`) so your UI still renders.
- For production use, store translations in DB/cache and refresh them asynchronously via queued jobs to reduce API calls.
