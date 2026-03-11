<?php

namespace App\Http\Controllers;

use App\Services\OllamaService;
use Illuminate\Http\Request;

class AiController extends Controller
{
    private OllamaService $ollama;

    public function __construct(OllamaService $ollama)
    {
        $this->ollama = $ollama;
    }

    // Génère un résumé pour un livre
    public function summarize(Request $request)
    {
        $title = $request->input('title', 'Titre inconnu');
        $result = $this->ollama->summarizeBook($title);

        return response()->json($result);
    }

    // Analyse de stock (pour le dashboard)
    public function stockAnalysis()
    {
        return view('admin.ai.stock-analysis');
    }

    // Recherche naturelle (pour les adhérents)
    public function naturalSearch(Request $request)
    {
        $query = $request->input('query', '');
        
        // Pour l'instant, retourne une vue vide
        // On la remplira après
        return view('catalog.search', ['query' => $query]);
    }
}