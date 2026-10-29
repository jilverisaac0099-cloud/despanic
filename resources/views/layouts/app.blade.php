<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gestión de Tabaco') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts y Estilos (Vite / Tailwind) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- SweetAlert2 (Para alertas bonitas como la de cerrar sesión) -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="min-h-screen">
            
            <!-- Aquí se incluye la barra de navegación que acabamos de crear -->
            @include('layouts.navigation')

            <!-- Contenido Principal de la Página -->
            <main class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <!-- Mensajes de Éxito o Alertas Flash -->
                    @if(session('success'))
                        <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-800 dark:bg-emerald-950/50 dark:border-emerald-800 dark:text-emerald-300 px-4 py-3 rounded-xl shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 bg-red-50 border border-red-200 text-red-800 dark:bg-red-950/50 dark:border-red-800 dark:text-red-300 px-4 py-3 rounded-xl shadow-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Aquí se inyectarán las vistas hijas (index, create, edit, show) -->
                    @yield('content')

                </div>
            </main>
        </div>
    </body>
</html>