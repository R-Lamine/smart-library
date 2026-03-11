@extends('layouts.public')

@section('title', 'Rechercher un livre')

@section('content')
    <div class="text-center mb-10">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Que voulez-vous lire aujourd'hui ?</h2>
        <p class="text-gray-500 italic">Utilisez la recherche classique ou laissez-vous guider par notre assistant.</p>
    </div>

    <div class="max-w-4xl mx-auto">
        {{-- TODO: Formulaire de recherche --}}
    </div>

    <div class="mt-12">
        <div class="flex justify-between items-end mb-6">
            <h3 class="text-xl font-bold text-gray-800">Notre Catalogue</h3>
            <span class="text-sm text-gray-500">{{ $books->total() }} ouvrages trouvés</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($books as $book)
                <x-book-card :book="$book" />
            @empty
                <div class="col-span-3 bg-white p-8 rounded-lg shadow-sm text-center text-gray-500">
                    <p>Aucun livre dans le catalogue pour le moment.</p>
                </div>
            @endforelse
        </div>
        
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    </div>
@endsection