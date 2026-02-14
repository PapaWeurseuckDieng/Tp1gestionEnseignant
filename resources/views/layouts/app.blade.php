<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen">

    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 text-white">
            <h1 class="text-2xl font-bold tracking-wide">
                 Gestion des Enseignants
            </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10 fade-in">
        @yield('content')
    </main>

</body>
</html>