@extends('layouts.app')

@section('title', 'Catalogue des livres')

@section('content')
    <header class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-semibold text-gray-800">Gestion du Catalogue</h2>
        

        <a href="{{ route('admin.books.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Ajouter un livre
        </a>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- On boucle sur les livres envoyés par le contrôleur --}}
        @forelse($books as $book)
            {{-- On utilise le composant book-card --}}
            <x-book-card :book="$book" />
        @empty
            <div class="col-span-3 bg-white p-8 rounded-lg shadow-sm text-center text-gray-500">
                <p>Aucun livre trouvé dans le catalogue.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $books->links() }}
    </div>
@endsection