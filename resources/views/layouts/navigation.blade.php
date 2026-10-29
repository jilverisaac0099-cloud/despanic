<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo / Inicio -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 text-decoration-none">
                        <div class="p-2 bg-emerald-600 text-white rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="font-bold text-lg text-gray-800 dark:text-gray-200">San Andrés</span>
                    </a>
                </div>

                <!-- Enlaces y Menús Desplegables de Escritorio (22 Tablas) -->
                <div class="hidden sm:ml-8 sm:flex sm:items-center sm:space-x-6">
                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-emerald-600 text-decoration-none">
                        Dashboard
                    </a>

                    <!-- 1. Recepción y Lotes (3 tablas) -->
                    <div x-data="{ drop: false }" @click.outside="drop = false" class="relative">
                        <button @click="drop = !drop" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 focus:outline-none">
                            <span>Recepción y Lotes</span>
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div x-show="drop" x-transition class="absolute left-0 mt-2 w-52 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                            <a href="{{ route('lots_receptions.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Lotes Recepción</a>
                            <a href="{{ route('lots_details.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Detalle de Lotes</a>
                            <a href="{{ route('drying_receptions.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Recepciones de Secado</a>
                        </div>
                    </div>

                    <!-- 2. Secado y Hornos (7 tablas) -->
                    <div x-data="{ drop: false }" @click.outside="drop = false" class="relative">
                        <button @click="drop = !drop" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 focus:outline-none">
                            <span>Secado y Hornos</span>
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div x-show="drop" x-transition class="absolute left-0 mt-2 w-52 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                            <a href="{{ route('oven_hornos.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Hornos</a>
                            <a href="{{ route('exit_dryings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Salidas de Secado</a>
                            <a href="{{ route('bale_dryings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Fardos de Secado</a>
                            <a href="{{ route('drying_closures.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Cierres de Secado</a>
                            <a href="{{ route('bale_compositions.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Composición de Fardos</a>
                            <a href="{{ route('bale_packagings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Empacado de Fardos</a>
                            <a href="{{ route('temperatures.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Temperaturas</a>
                        </div>
                    </div>

                    <!-- 3. Despalillo (7 tablas) -->
                    <div x-data="{ drop: false }" @click.outside="drop = false" class="relative">
                        <button @click="drop = !drop" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 focus:outline-none">
                            <span>Despalillo</span>
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div x-show="drop" x-transition class="absolute left-0 mt-2 w-52 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                            <a href="{{ route('destemming_preparations.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Preparación Despalillo</a>
                            <a href="{{ route('vein_destemmings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Despalillo de Vena</a>
                            <a href="{{ route('destemming_deliveries.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Entregas Despalillo</a>
                            <a href="{{ route('detailed_destemmings.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Despalillo Detallado</a>
                            <a href="{{ route('destemming_drawers.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Gavetas Despalillo</a>
                            <a href="{{ route('drawers_entrys.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Entrada de Gavetas</a>
                            <a href="{{ route('destemming_closures.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Cierres de Despalillo</a>
                        </div>
                    </div>

                    <!-- 4. Pilones y Tabaco (3 tablas) -->
                    <div x-data="{ drop: false }" @click.outside="drop = false" class="relative">
                        <button @click="drop = !drop" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 focus:outline-none">
                            <span>Pilones y Tabaco</span>
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div x-show="drop" x-transition class="absolute left-0 mt-2 w-52 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                            <a href="{{ route('pilons.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Pilones</a>
                            <a href="{{ route('pilon_origins.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Origen de Pilones</a>
                            <a href="{{ route('tobacco_classes.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Clases de Tabaco</a>
                        </div>
                    </div>

                    <!-- 5. Administración (2 tablas) -->
                    <div x-data="{ drop: false }" @click.outside="drop = false" class="relative">
                        <button @click="drop = !drop" class="inline-flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-emerald-600 focus:outline-none">
                            <span>Administración</span>
                            <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                        <div x-show="drop" x-transition class="absolute left-0 mt-2 w-48 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                            <a href="{{ route('employees.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Empleados</a>
                            <a href="{{ route('events.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 text-decoration-none">Eventos</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menú de Usuario (Derecha) -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div x-data="{ userDrop: false }" @click.outside="userDrop = false" class="relative">
                    <button @click="userDrop = !userDrop" class="inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-xl text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <img class="h-9 w-9 rounded-full object-cover mr-3 border border-gray-200 dark:border-gray-700" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()?->name ?? 'Admin') }}&color=059669&background=d1fae5" alt="Avatar" />
                        <div class="flex flex-col items-start mr-1">
                            <span class="font-bold text-gray-800 dark:text-gray-200 leading-tight">{{ Auth::user()?->name ?? 'Administrador' }}</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400 leading-tight">{{ Auth::user()?->email ?? 'admin@tabacalera.com' }}</span>
                        </div>
                        <svg class="ml-1 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="userDrop" x-transition class="absolute right-0 mt-2 w-48 rounded-xl shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 z-50">
                        @if(Route::has('profile.edit'))
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 text-decoration-none">Perfil</a>
                        @endif
                        @if(Route::has('logout'))
                            <form method="POST" action="{{ route('logout') }}" id="form-logout-desktop">
                                @csrf
                                <button type="button" onclick="confirmarCierreSesion('form-logout-desktop')" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    Cerrar Sesión
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Botón Hamburguesa Móvil -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
