<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClearbitService;

class ClearbitController extends Controller
{
    protected $clearbitService;

    public function __construct(ClearbitService $clearbitService)
    {
        $this->clearbitService = $clearbitService;
    }

    public function showLogo(Request $request)
    {
        $domain = $request->input('domain');
        $logoUrl = $this->clearbitService->getLogo($domain);

        if ($logoUrl) {
            return response()->json(['logo_url' => $logoUrl]);
        } else {
            return response()->json(['error' => 'Logo not found'], 404);
        }
    }
}
