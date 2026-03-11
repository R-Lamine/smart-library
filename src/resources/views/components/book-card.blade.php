@props(['book'])

<div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 flex flex-col hover:shadow-xl transition-shadow">
    <div class="relative h-64 bg-slate-800 flex items-center justify-center">
        @if($book->cover_image)
            <img src="{{ $book->cover_image }}" alt="Couverture de {{ $book->title }}" class="w-full h-full object-cover">
        @else
            <i class="fas fa-book-open text-slate-600 text-6xl"></i>
        @endif
        <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">{{ $book->category->name }}</span>
    </div>
    <div class="p-6 flex-1 flex flex-col">
        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $book->title }}</h3>
        <p class="text-sm text-gray-500 mb-4">Par <strong>{{ $book->author->name }}</strong></p>
        
        @if($book->summary_ai)
        <div class="bg-blue-50 p-3 rounded-lg mb-4 flex-1">
            <div class="flex items-center text-blue-700 text-[10px] font-bold uppercase mb-1"><i class="fas fa-robot mr-1"></i> Résumé IA</div>
            <p class="text-gray-700 text-xs leading-relaxed line-clamp-4">{{ $book->summary_ai }}</p>
        </div>
        @endif

        <div class="flex justify-between items-center mt-auto pt-4 border-t">
            <div class="text-xs">
                @if($book->isAvailable())
                    <span class="text-green-600 font-bold">Disponible ({{ $book->available_quantity }})</span>
                @else
                    <span class="text-red-600 font-bold">Indisponible</span>
                @endif
            </div>
            {{-- TODO: ajouter les vrais boutons (modifier/supprimer) --}}
            <a href="#" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-bold">Gérer</a>
        </div>
    </div>
</div>