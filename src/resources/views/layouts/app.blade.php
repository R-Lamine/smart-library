<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Biblio-IA')</title>
    {{-- On charge Tailwind et FontAwesome via Vite --}}
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        {{-- Sidebar de l'admin --}}
        <div class="w-64 bg-slate-800 text-white p-6">
            <h1 class="text-2xl font-bold mb-8">Biblio-IA</h1>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block p-2 rounded {{ request()->routeIs('dashboard') ? 'bg-blue-600' : 'hover:bg-slate-700' }}">Dashboard</a>
                <a href="{{ route('admin.books.index') }}" class="block p-2 rounded {{ request()->routeIs('admin.books.*') ? 'bg-blue-600' : 'hover:bg-slate-700' }}">Catalogue</a>
                <a href="#" class="block p-2 hover:bg-slate-700 rounded">Adhérents</a>
                <a href="#" class="block p-2 hover:bg-slate-700 rounded">Emprunts</a>
            </nav>
        </div>

        {{-- Contenu principal de la page --}}
        <main class="flex-1 p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>