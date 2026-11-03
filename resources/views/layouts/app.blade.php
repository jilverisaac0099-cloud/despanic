<!DOCTYPE html><html lang="es" class="h-full bg-gray-950"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despánic - Trazabilidad Tabacalera</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script></head><body class="h-full bg-gray-950 text-gray-100 font-sans antialiased flex flex-col">

    <!-- Barra de Navegación Despánic -->
    <nav class="bg-gray-900 border-b border-gray-800 text-gray-200 px-6 py-3 select-none relative z-50 shadow-lg flex-shrink-0">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            
            <!-- Logotipo y Nombre: Tabacalera Despánic -->
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-tr from-emerald-600 to-emerald-500 text-white w-10 h-10 rounded-xl font-black flex items-center justify-center shadow-lg shadow-emerald-900/50 text-sm tracking-wider">
                    DP
                </div>
                <div>
                    <span class="font-extrabold text-base tracking-wide text-white block leading-tight">Despánic</span>
                    <span class="text-[10px] uppercase tracking-widest text-emerald-400 font-semibold block">Trazabilidad Tabacalera</span>
                </div>
            </div>

            <!-- Menú de Navegación Principal -->
            <div class="hidden xl:flex items-center space-x-1">
                
                <!-- Dashboard -->
                <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 hover:text-white transition-colors">
                    Dashboard
                </a>

                <!-- 1. Campo y Recepción -->
                <div class="relative dropdown-container">
                    <button onclick="toggleMenu('menu-campo')" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center space-x-1 hover:bg-gray-800 hover:text-white transition-colors focus:outline-none">
                        <span>Campo y Recepción</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="menu-campo" class="dropdown-menu hidden absolute left-0 mt-2 w-64 bg-gray-900 border border-gray-700/80 rounded-xl shadow-2xl py-2 z-50">
                        <a href="{{ route('lots_receptions.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Lotes Recepción</a>
                        <a href="{{ route('lots_details.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Detalle de Lotes</a>
                        <a href="{{ route('pilon_origins.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Origen de Pilones</a>
                        <a href="{{ route('tobacco_classes.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Clases de Tabaco</a>
                    </div>
                </div>

                <!-- 2. Secado y Hornos -->
                <div class="relative dropdown-container">
                    <button onclick="toggleMenu('menu-secado')" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center space-x-1 hover:bg-gray-800 hover:text-white transition-colors focus:outline-none">
                        <span>Secado y Hornos</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="menu-secado" class="dropdown-menu hidden absolute left-0 mt-2 w-64 bg-gray-900 border border-gray-700/80 rounded-xl shadow-2xl py-2 z-50 max-h-96 overflow-y-auto">
                        <a href="{{ route('oven_hornos.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Hornos</a>
                        <a href="{{ route('exit_dryings.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Salidas de Secado</a>
                        <a href="{{ route('drying_receptions.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Recepciones de Secado</a>
                        <a href="{{ route('bale_dryings.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Fardos de Secado</a>
                        <a href="{{ route('drying_closures.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Cierres de Secado</a>
                        <a href="{{ route('bale_compositions.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Composición de Fardos</a>
                        <a href="{{ route('bale_packagings.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Empacado de Fardos</a>
                    </div>
                </div>

                <!-- 3. Despalillo -->
                <div class="relative dropdown-container">
                    <button onclick="toggleMenu('menu-despalillo')" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center space-x-1 hover:bg-gray-800 hover:text-white transition-colors focus:outline-none">
                        <span>Despalillo</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="menu-despalillo" class="dropdown-menu hidden absolute left-0 mt-2 w-64 bg-gray-900 border border-gray-700/80 rounded-xl shadow-2xl py-2 z-50 max-h-96 overflow-y-auto">
                        <a href="{{ route('destemming_preparations.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Preparación Despalillo</a>
                        <a href="{{ route('vein_destemmings.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Despalillo de Venas</a>
                        <a href="{{ route('destemming_deliveries.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Entregas Despalillo</a>
                        <a href="{{ route('detailed_destemmings.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Despalillo Detallado</a>
                        <a href="{{ route('destemming_drawers.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Gavetas Despalillo</a>
                        <a href="{{ route('drawers_entrys.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Entrada de Gavetas</a>
                        <a href="{{ route('destemming_closures.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Cierres de Despalillo</a>
                    </div>
                </div>

                <!-- 4. Pilones -->
                <div class="relative dropdown-container">
                    <button onclick="toggleMenu('menu-pilones')" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center space-x-1 hover:bg-gray-800 hover:text-white transition-colors focus:outline-none">
                        <span>Pilones</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="menu-pilones" class="dropdown-menu hidden absolute left-0 mt-2 w-64 bg-gray-900 border border-gray-700/80 rounded-xl shadow-2xl py-2 z-50">
                        <a href="{{ route('pilons.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Gestión de Pilones</a>
                    </div>
                </div>

                <!-- 5. Administración -->
                <div class="relative dropdown-container">
                    <button onclick="toggleMenu('menu-admin')" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center space-x-1 hover:bg-gray-800 hover:text-white transition-colors focus:outline-none">
                        <span>Administración</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="menu-admin" class="dropdown-menu hidden absolute left-0 mt-2 w-64 bg-gray-900 border border-gray-700/80 rounded-xl shadow-2xl py-2 z-50">
                        <a href="{{ route('employees.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Empleados</a>
                        <a href="{{ route('events.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Eventos</a>
                        <a href="{{ route('temperatures.index') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-emerald-600/20 hover:text-emerald-400">Temperaturas</a>
                    </div>
                </div>

            </div>

            <!-- Perfil de Usuario -->
            <div class="flex items-center space-x-3 bg-gray-800/60 px-3 py-1.5 rounded-xl border border-gray-700/50">
                <span class="bg-emerald-600 text-white text-xs font-bold w-7 h-7 rounded-lg flex items-center justify-center shadow">AD</span>
                <div class="text-left">
                    <span class="text-xs font-semibold text-white block">Administrador</span>
                    <span class="text-[10px] text-gray-400 block">admin@despanic.com</span>
                </div>
            </div>

        </div>
    </nav>

    <!-- Script de Menús Desplegables -->
    <script>
        function toggleMenu(menuId) {
            const menu = document.getElementById(menuId);
            const isHidden = menu.classList.contains('hidden');
            document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
            if (isHidden) {
                menu.classList.remove('hidden');
            }
        }
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-container')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
            }
        });
    </script>

    <!-- Contenido Principal con Botón de Agregar Global Corregido -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-8">
        
        <!-- Botón Global para Agregar / Nuevo Registro -->
        <div class="flex justify-end mb-6">
            <a href="javascript:history.back()" class="bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-semibold px-4 py-2 rounded-xl border border-gray-700 transition-all flex items-center space-x-2 mr-3">
                <span>← Volver</span>
            </a>
            
            @php
                // Detecta automáticamente la ruta .create basada en la URL actual (ej: /lots_receptions -> lots_receptions.create)
                $currentRouteName = Route::currentRouteName();
                $baseRoute = $currentRouteName ? Str::before($currentRouteName, '.') : null;
                $createRoute = ($baseRoute && Route::has($baseRoute . '.create')) ? route($baseRoute . '.create') : '#';
            @endphp

            <a href="{{ $createRoute }}" class="bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Nuevo Registro</span>
            </a>
        </div>

        @yield('content')
        {{ $slot ?? '' }}
    </main></body></html>
    