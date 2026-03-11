<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Biblio-IA')</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 min-h-screen">
    <nav class="bg-white shadow-sm p-4 flex justify-between items-center px-12 border-b">
        <h1 class="text-xl font-bold text-blue-600"><i class="fas fa-book-open mr-2"></i>Biblio-IA</h1>
        <div class="space-x-6 text-gray-600">
            <a href="#" class="hover:text-blue-600">Mon Profil</a>
            <a href="#" class="hover:text-blue-600">Mes Lectures</a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Déconnexion</button>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto py-12 px-6">
        @yield('content')
    </main>
</body>
</html>