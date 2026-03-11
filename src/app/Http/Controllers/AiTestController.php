<?php

namespace App\Http\Controllers;

use App\Services\OllamaService;

class AiTestController extends Controller
{
    public function ping(OllamaService $ollama)
    {
        $result = $ollama->generate("Dis bonjour en français en une phrase.");

        return response()->json($result);
    }

    public function summary(OllamaService $ollama)
    {
        $result = $ollama->summarizeBook("L'Étranger", 3);

        return response()->json($result);
    }
}