<x-app-layout>
    <!-- Fondo General: #EEDCA6 -->
    <div class="flex min-h-screen relative" style="background-color: #EEDCA6;">
        
        <!-- 1. Barra Lateral (Sidebar): #F6EBCB con borde Dorado Suave #C59B27 -->
        <aside class="w-64 border-r hidden md:flex flex-col justify-between p-6 shadow-sm" style="background-color: #F6EBCB; border-color: #C59B27;">
            <div>
                <!-- Logo y Título Centrado -->
                <div class="flex flex-col items-center text-center mb-8 pb-6 border-b" style="border-color: #C59B27;">
                    <img src="{{ asset('images/WhatsApp Image 2026-11-10 at 10.14.28 PM (1).jpeg') }}"
                         alt="Despanic SA"
                         class="w-28 h-28 rounded-full shadow-md object-cover border-2 mb-3" style="border-color: #C59B27;">
                    
                    <div>
                        <h4 class="font-extrabold text-gray-900 text-base tracking-wider uppercase">DESPANIC S.A.</h4>
                        <p class="text-xs text-gray-600 font-medium mt-0.5">Trazabilidad Tabacalera</p>
                    </div>
                </div>

                <!-- Enlaces de Navegación -->
                <nav class="space-y-1.5 text-sm">
                    <!-- Panel Principal -->
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('dashboard') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('dashboard') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('dashboard') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('dashboard') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Panel Principal</span>
                    </a>

                    <!-- 1. Recepción -->
                    <a href="{{ route('receptions.menu') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('receptions*') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('receptions*') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('receptions*') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('receptions*') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('receptions*') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span>1. Recepción</span>
                    </a>

                    <!-- 2. Pilones -->
                    <a href="{{ route('pilons.menu') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('pilons*') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('pilons*') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('pilons*') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('pilons*') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('pilons*') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <span>２. Pilones</span>
                    </a>

                    <!-- 3. Despalillo -->
                    <a href="{{ route('destemmings.menu') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('destemmings*') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('destemmings*') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('destemmings*') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('destemmings*') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('destemmings*') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span>3. Despalillo</span>
                    </a>

                    <!-- 4. Secadero -->
                    <a href="{{ route('dryings.menu') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('dryings*') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('dryings*') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('dryings*') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('dryings*') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('dryings*') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>4. Secadero</span>
                    </a>

                    <!-- 5. Pacas -->
                    <a href="{{ route('bales.menu') }}" 
                       class="flex items-center space-x-3 px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('bales*') ? 'text-white shadow' : 'text-gray-700' }}" 
                       style="{{ request()->routeIs('bales*') ? 'background-color: #3A5A40;' : '' }}"
                       onmouseover="this.style.backgroundColor='#3A5A40'; this.style.color='white';" 
                       onmouseout="this.style.backgroundColor='{{ request()->routeIs('bales*') ? '#3A5A40' : 'transparent' }}'; this.style.color='{{ request()->routeIs('bales*') ? 'white' : '#374151' }}';">
                        <svg class="w-5 h-5 {{ request()->routeIs('bales*') ? 'text-white' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <span>5. Pacas</span>
                    </a>
                </nav>
            </div>

            <!-- Tarjeta inferior en la barra lateral -->
            <div class="p-4 rounded-2xl text-white text-xs space-y-1 shadow-sm" style="background-color: #3A5A40;">
                <p class="font-bold">Control Total</p>
                <p class="opacity-80 text-[11px]">Sistema operativo de fábrica en línea.</p>
            </div>
        </aside>

        <!-- 2. Contenido Principal -->
        <main class="flex-1 p-6 md:p-8 space-y-6 overflow-y-auto">
            
            <!-- Banner Verde con Menú de Usuario DENTRO de la esquina superior derecha -->
            <div class="p-8 rounded-3xl text-white shadow-md flex flex-col justify-between relative overflow-hidden border" style="background: linear-gradient(135deg, #3A5A40 0%, #2c4231 100%); min-height: 200px; border-color: #C59B27;">
                
                <!-- Menú Desplegable de Usuario DENTRO del cuadro verde (esquina superior derecha) -->
                <div class="absolute top-6 right-6 z-20">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 text-xs font-bold uppercase tracking-wider text-white bg-white/15 hover:bg-white/25 rounded-xl border border-white/20 backdrop-blur-md transition shadow-sm">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Contenido del Banner (con espacio a la derecha para que no choque con el botón) -->
                <div class="relative z-10 space-y-2 pr-32">
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-white/20 text-white">
                        Panel de Control
                    </span>
                    <h1 class="text-3xl font-extrabold tracking-tight">Bienvenido, {{ Auth::user()->name }}</h1>
                    <p class="text-sm text-emerald-100 max-w-xl">
                        Supervisa el flujo operativo de las 5 áreas de producción tabacalera desde un solo lugar de forma centralizada y segura.
                    </p>
                </div>

                <!-- Widget flotante dentro del banner -->
                <div class="mt-6 inline-flex items-center gap-4 bg-white/10 backdrop-blur-md px-4 py-3 rounded-2xl border border-white/20 self-start z-10">
                    <div>
                        <span class="text-xs text-emerald-200 block">Estado de Planta</span>
                        <span class="text-lg font-bold">Activo / En Turno</span>
                    </div>
                </div>
            </div>

            <!-- Sección de Tarjetas de Acceso a las Áreas + Actividad Reciente -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Tarjeta Área 1 -->
                <div class="p-6 rounded-2xl shadow-sm transition hover:shadow-md flex flex-col justify-between border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold px-2.5 py-1 rounded-lg text-emerald-800 bg-emerald-50">Área 1</span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 mb-1">Recepción de Materia Prima</h3>
                        <p class="text-xs text-gray-600 mb-6">Gestión de lotes y proveedores que ingresan a planta.</p>
                    </div>
                    <a href="{{ route('receptions.menu') }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-white text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90" style="background-color: #3A5A40;">
                        Ingresar al Área →
                    </a>
                </div>

                <!-- Tarjeta Área 2 -->
                <div class="p-6 rounded-2xl shadow-sm transition hover:shadow-md flex flex-col justify-between border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold px-2.5 py-1 rounded-lg text-emerald-800 bg-emerald-50">Área 2</span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 mb-1">Pilones y Fermentación</h3>
                        <p class="text-xs text-gray-600 mb-6">Control térmico, eventos, giros y armado de pilones.</p>
                    </div>
                    <a href="{{ route('pilons.menu') }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-white text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90" style="background-color: #3A5A40;">
                        Ingresar al Área →
                    </a>
                </div>

                <!-- Tarjeta Área 3 -->
                <div class="p-6 rounded-2xl shadow-sm transition hover:shadow-md flex flex-col justify-between border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold px-2.5 py-1 rounded-lg text-emerald-800 bg-emerald-50">Área 3</span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 mb-1">Despalillo</h3>
                        <p class="text-xs text-gray-600 mb-6">Control de operarios, entregas y clases de tabaco.</p>
                    </div>
                    <a href="{{ route('destemmings.menu') }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-white text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90" style="background-color: #3A5A40;">
                        Ingresar al Área →
                    </a>
                </div>

                <!-- Tarjeta Área 4 -->
                <div class="p-6 rounded-2xl shadow-sm transition hover:shadow-md flex flex-col justify-between border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold px-2.5 py-1 rounded-lg text-emerald-800 bg-emerald-50">Área 4</span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 mb-1">Secadero y Hornos</h3>
                        <p class="text-xs text-gray-600 mb-6">Monitoreo de ingresos a hornos y gavetas de secado.</p>
                    </div>
                    <a href="{{ route('dryings.menu') }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-white text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90" style="background-color: #3A5A40;">
                        Ingresar al Área →
                    </a>
                </div>

                <!-- Tarjeta Área 5 -->
                <div class="p-6 rounded-2xl shadow-sm transition hover:shadow-md flex flex-col justify-between border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-bold px-2.5 py-1 rounded-lg text-emerald-800 bg-emerald-50">Área 5</span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 mb-1">Empaque y Pacas</h3>
                        <p class="text-xs text-gray-600 mb-6">Registro final de empaque para exportación.</p>
                    </div>
                    <a href="{{ route('bales.menu') }}" class="inline-flex items-center justify-center w-full px-4 py-2 text-white text-xs font-semibold rounded-xl shadow-sm transition hover:opacity-90" style="background-color: #3A5A40;">
                        Ingresar al Área →
                    </a>
                </div>

                <!-- 6. Bloque Actividad Reciente en Planta (Colapsable con Alpine.js) -->
                <div x-data="{ abierto: false }" class="p-6 rounded-2xl shadow-sm flex flex-col justify-between h-full border" style="background-color: #F6EBCB; border-color: #C59B27;">
                    <div>
                        <!-- Encabezado Interactivo -->
                        <div @click="abierto = !abierto" class="flex items-center justify-between pb-3 cursor-pointer select-none group border-b" style="border-color: #EEDCA6;">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                                </span>
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-emerald-700 transition">Actividad Reciente en Planta</h3>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <span class="text-[10px] uppercase font-bold text-gray-500 tracking-wider">En Vivo</span>
                                <svg :class="abierto ? 'rotate-180' : ''" class="w-4 h-4 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Lista Desplegable -->
                        <div x-show="abierto" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-2"
                             class="space-y-3 max-h-[220px] overflow-y-auto pr-1 mt-3 pt-3 border-t" style="border-color: #EEDCA6; display: none;">
                             
                            @forelse ($actividades ?? [] as $act)
                                <div class="flex items-start gap-3 p-2 rounded-xl transition hover:bg-[#EEDCA6]/50 border-b border-[#EEDCA6] last:border-b-0">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-xs shadow-sm">
                                            {{ substr($act->area, 0, 1) }}
                                        </div>
                                    </div>
                                    
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="text-xs font-extrabold text-gray-800">{{ $act->usuario_name ?? $act->usuario_nombre ?? 'Usuario' }}</span>
                                            <span class="px-1.5 py-0.5 text-[9px] font-bold rounded bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                {{ $act->area }}
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                                            {{ $act->descripcion }}
                                        </p>
                                        <span class="text-[10px] text-gray-500 block mt-1">
                                            {{ $act->created_at->diffForHumans() }} ({{ $act->created_at->format('h:i A') }})
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="py-8 text-center">
                                    <p class="text-xs text-gray-500">No se registran actividades el día de hoy.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Botón inferior para expandir -->
                    <div @click="abierto = !abierto" x-show="!abierto" class="text-center pt-3 cursor-pointer">
                        <span class="text-[11px] font-medium text-emerald-800 hover:underline">Haz clic para ver el historial →</span>
                    </div>
                </div>

            </div>

        </main>
    </div>
</x-app-layout>

