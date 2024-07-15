<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PREVET</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Inline Styles -->
    <style>
        /* Tailwind CSS v3.4.1 | MIT License | https://tailwindcss.com */
        /* Custom or predefined Tailwind CSS styles */
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <!-- Header -->
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                    <!-- Logo placeholder -->
                </div>
                <div class="flex items-center justify-end lg:hidden">
                    <!-- Menu button placeholder -->
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 flex flex-col items-center justify-center">
                <div class="text-center">
                    <h1 class="text-xl font-semibold mb-6">Bem-vindo a Prevet</h1>
                </div>
            </main>

            <!-- Alert -->
            <div id="alert" class="flex p-4 mb-4 bg-yellow-100 text-center border-t-4 border-yellow-500">
                <p class="text-yellow-700 font-medium">
                    Atenção: Página em manutenção
                </p>
            </div>

            <!-- Footer -->
            <footer class="mt-6 text-center text-sm text-black/70 dark:text-white/70">
                <p>&copy; {{ date('Y') }} Prevet. Todos os direitos reservados.</p>
            </footer>
        </div>
    </div>
</div>

<!-- Vite JS -->
@vite('resources/js/app.js')

</body>
</html>
