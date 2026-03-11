@extends('layouts.app')

@section('title', 'Ajouter un livre')

@section('content')
<h2 class="text-2xl font-bold mb-6">Ajouter un nouveau livre</h2>

<form method="POST" action="{{ route('admin.books.store') }}" class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf

    <div>
        <label class="block font-semibold mb-1">Titre</label>
        <input type="text" name="title" id="title" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">ISBN</label>
        <input type="text" name="isbn" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">Auteur</label>
        <select name="author_id" class="w-full border rounded p-2">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold mb-1">Catégorie</label>
        <select name="category_id" class="w-full border rounded p-2">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold mb-1">Résumé IA</label>

        <textarea name="summary_ai" id="summary_ai"
                  class="w-full border rounded p-2 h-32"></textarea>

        <button type="button"
                id="generateSummary"
                class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            🤖 Générer avec l'IA
        </button>
    </div>

    <div class="pt-4">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Enregistrer
        </button>
    </div>
</form>

{{-- SCRIPT IA --}}
<script>
document.getElementById('generateSummary').addEventListener('click', async function () {

    const title = document.getElementById('title').value;

    if (!title) {
        alert("Veuillez saisir un titre d'abord !");
        return;
    }

    this.innerText = "⏳ Génération...";
    this.disabled = true;

    try {
        const response = await fetch("{{ route('admin.ai.summarize') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ title: title })
        });

        const data = await response.json();

        if (data.ok) {
            document.getElementById('summary_ai').value = data.response;
        } else {
            alert("Erreur IA");
        }

    } catch (error) {
        alert("Erreur de connexion à l'IA");
    }

    this.innerText = "🤖 Générer avec l'IA";
    this.disabled = false;
});
</script>

@endsection