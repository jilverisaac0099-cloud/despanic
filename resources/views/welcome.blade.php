<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despánic - Trazabilidad y Gestión de Tabaco</title>
    <!-- Vite CSS / Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full text-gray-100 font-sans antialiased selection:bg-emerald-500 selection:text-white flex flex-col justify-between">

    <!-- Navbar Superior -->
    <header class="border-b border-gray-800 bg-gray-900/60 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            <!-- Logo / Nombre -->
            <div class="flex items-center space-x-3">
                <div class="bg-emerald-600 p-2 rounded-lg text-white font-bold flex items-center justify-center shadow-lg shadow-emerald-900/40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="text-xl font-black tracking-wider text-white">Despánic</span>
            </div>

            <!-- Accesos directos basados en tus recursos -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('lots_receptions.index') }}" class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-gray-300 hover:text-emerald-400 transition-colors">
                    Recepción de Lotes
                </a>
                <a href="{{ route('pilons.index') }}" class="px-3 py-2 text-xs font-semibold uppercase tracking-wider text-gray-300 hover:text-emerald-400 transition-colors">
                    Pilones
                </a>
                <a href="{{ route('lots_receptions.create') }}" class="px-4 py-2 text-sm font-medium bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg transition-all shadow-md shadow-emerald-900/30">
                    Nueva Recepción
                </a>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="flex-grow flex items-center relative overflow-hidden py-12">
        <!-- Fondo decorativo sutil -->
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Texto e Introducción (Columna Izquierda) -->
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/25">
                    EXCELENCIA Y TRADICIÓN TABACALERA
                </span>
                
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight">
                    Tabacalera <span class="text-emerald-500">Despánic</span>
                </h1>
                
                <p class="text-lg text-gray-300 max-w-2xl leading-relaxed">
                    Plataforma inteligente para la trazabilidad total: control absoluto desde los lotes en campo, hornos de secado y despalillo, hasta la fermentación perfecta en pilones.
                </p>

                <!-- Botones de Acción Rápida con tus rutas de recursos -->
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('lots_receptions.index') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center space-x-2">
                        <span>Iniciar Recepción de Lotes</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="{{ route('pilons.index') }}" class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-gray-200 font-semibold rounded-xl border border-gray-700 transition-all">
                        Ver Pilones
                    </a>
                </div>
            </div>

            <!-- Panel de Estadísticas / Estado del Sistema (Columna Derecha) -->
            <div class="lg:col-span-5">
                <div class="bg-gray-900/80 border border-gray-800 rounded-2xl p-8 shadow-2xl backdrop-blur-xl space-y-8 relative">
                    <!-- Efecto brillo superior -->
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-px bg-gradient-to-r from-transparent via-emerald-500 to-transparent"></div>

                    <!-- Módulos CRUD Activos -->
                    <div class="text-center space-y-1">
                        <span class="text-4xl sm:text-5xl font-black text-emerald-400 tracking-tight">22</span>
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400">MÓDULOS CRUD ACTIVOS</p>
                    </div>

                    <!-- Divisor -->
                    <div class="h-px bg-gray-800 w-full"></div>

                    <!-- Trazabilidad en Planta -->
                    <div class="text-center space-y-1">
                        <span class="text-4xl sm:text-5xl font-black text-white tracking-tight">100%</span>
                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400">TRAZABILIDAD EN PLANTA</p>
                    </div>

                    <!-- Estado del Sistema Sincronizado -->
                    <div class="pt-2 flex justify-center">
                        <div class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-full bg-emerald-950/50 border border-emerald-800/50 text-emerald-400 text-xs font-medium">
                            <span class="relative flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            <span>Sistema Sincronizado</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-900 bg-gray-950 py-6 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} Tabacalera Despánic. Todos los derechos reservados. Módulo de Gestión de Tabaco.</p>
    </footer>

</body>
</html>
