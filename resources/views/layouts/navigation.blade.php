<nav class="bg-gray-900 border-b border-gray-800 text-gray-200 px-4 py-3" x-data="{ openMenu: null }">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- Logo / Nombre (Ej: San Andrés / Despánic) -->
        <div class="flex items-center space-x-2">
            <span class="bg-emerald-600 text-white p-2 rounded-lg font-bold">SA</span>
            <span class="font-bold text-lg text-white">San Andrés</span>
        </div>

        <!-- Enlaces y Menús Desplegables -->
        <div class="flex items-center space-x-6">
            
            <a href="#" class="hover:text-emerald-400 text-sm font-medium">Dashboard</a>

            <!-- Menú Desplegable 1: Recepción y Lotes -->
            <div class="relative" @click.away="openMenu = null">
                <button @click="openMenu = openMenu === 'recepcion' ? null : 'recepcion'" class="flex items-center space-x-1 hover:text-emerald-400 text-sm font-medium focus:outline-none">
                    <span>Recepción y Lotes</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <!-- Dropdown individual controlado -->
                <div x-show="openMenu === 'recepcion'" 
                     x-transition 
                     class="absolute left-0 mt-2 w-48 bg-gray-900 border border-gray-700 rounded-lg shadow-xl py-2 z-50">
                    <a href="{{ route('lots_receptions.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Lotes Recepción</a>
                    <a href="{{ route('lots_details.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Detalle de Lotes</a>
                </div>
            </div>

            <!-- Menú Desplegable 2: Secado y Hornos -->
            <div class="relative" @click.away="openMenu = null">
                <button @click="openMenu = openMenu === 'secado' ? null : 'secado'" class="flex items-center space-x-1 hover:text-emerald-400 text-sm font-medium focus:outline-none">
                    <span>Secado y Hornos</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div x-show="openMenu === 'secado'" 
                     x-transition 
                     class="absolute left-0 mt-2 w-48 bg-gray-900 border border-gray-700 rounded-lg shadow-xl py-2 z-50">
                    <a href="{{ route('oven_hornos.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Hornos</a>
                    <a href="{{ route('exit_dryings.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Salidas de Secado</a>
                </div>
            </div>

            <!-- Menú Desplegable 3: Pilones y Tabaco -->
            <div class="relative" @click.away="openMenu = null">
                <button @click="openMenu = openMenu === 'pilones' ? null : 'pilones'" class="flex items-center space-x-1 hover:text-emerald-400 text-sm font-medium focus:outline-none">
                    <span>Pilones y Tabaco</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div x-show="openMenu === 'pilones'" 
                     x-transition 
                     class="absolute left-0 mt-2 w-48 bg-gray-900 border border-gray-700 rounded-lg shadow-xl py-2 z-50">
                    <a href="{{ route('pilons.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Pilones</a>
                    <a href="{{ route('pilon_origins.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Origen de Pilones</a>
                    <a href="{{ route('tobacco_classes.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-800 hover:text-white">Clases de Tabaco</a>
                </div>
            </div>

        </div>

        <!-- Usuario -->
        <div class="flex items-center space-x-3">
            <span class="bg-emerald-700 text-white text-xs px-2 py-1 rounded font-bold">AD</span>
            <span class="text-sm font-medium text-white">Administrador</span>
        </div>

    </div>
</nav>
