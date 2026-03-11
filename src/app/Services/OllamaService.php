<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\AiLog;

class OllamaService
{
    private string $host;
    private string $model;

    public function __construct()
    {
        $this->host = rtrim(env('OLLAMA_HOST', 'http://ollama:11434'), '/');
        $this->model = env('OLLAMA_MODEL', 'tinyllama');
    }

    /**
     * Génère une réponse via Ollama (API /api/generate)
     */
    public function generate(string $prompt, array $options = []): array
    {
        $payload = array_merge([
            'model' => $this->model,
            'prompt' => $prompt,
            'stream' => false,
        ], $options);

        $response = Http::timeout(120)->post("{$this->host}/api/generate", $payload);

        if (!$response->successful()) {
            return [
                'ok' => false,
                'error' => 'Ollama API error',
                'status' => $response->status(),
                'body' => $response->body(),
            ];
        }

        $data = $response->json();

        return [
            'ok' => true,
            'model' => $data['model'] ?? $this->model,
            'response' => $data['response'] ?? '',
            'raw' => $data,
        ];
    }

    /**
     * Exemple : générer un résumé court d'un livre
     */
    public function summarizeBook(string $title, int $lines = 10): array
    {
        $prompt = "Génère un résumé clair et cohérent du livre \"$title\" en environ $lines lignes. Répond uniquement avec le résumé.";

        $result = $this->generate($prompt);

        // Log en DB si OK
        if ($result['ok']) {
            AiLog::create([
                'type' => 'book_summary',
                'prompt' => $prompt,
                'response_json' => ['text' => $result['response']],
            ]);
        }

        return $result;
    }
}