@extends('layouts.app')

@section('title', 'Dashboard Bibliothécaire - IA')

@section('content')
    <header class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Tableau de bord</h2>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500 italic">Connecté : Admin Bibliothécaire</span>
        </div>
    </header>

    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Livres sortis</p>
            {{-- TODO: Rendre la valeur dynamique --}}
            <p class="text-2xl font-bold">142</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-red-500">
            <p class="text-gray-500 text-sm">Retards critiques</p>
            {{-- TODO: Rendre la valeur dynamique --}}
            <p class="text-2xl font-bold text-red-600">12</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
            <p class="text-gray-500 text-sm">Nouveaux adhérents</p>
            {{-- TODO: Rendre la valeur dynamique --}}
            <p class="text-2xl font-bold">8</p>
        </div>
    </div>

    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-1 rounded-xl shadow-lg mb-8">
        <div class="bg-white p-6 rounded-lg">
            <div class="flex items-center mb-4">
                <i class="fas fa-robot text-indigo-600 text-2xl mr-3"></i>
                <h3 class="text-xl font-bold text-gray-800">Assistant IA : Analyse des stocks</h3>
            </div>
            {{-- TODO: Rendre le texte dynamique via l'IA --}}
            <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100 text-gray-700 italic">
                "Après analyse des 6 derniers mois, le titre <strong>'Le Seigneur des Anneaux'</strong> est en tension (taux de rotation 94%). Je suggère l'achat de 2 exemplaires supplémentaires. À l'inverse, 5 ouvrages de la section 'Informatique 2015' n'ont pas bougé depuis 1 an."
            </div>
            <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Valider les suggestions</button>
        </div>
    </div>
@endsection