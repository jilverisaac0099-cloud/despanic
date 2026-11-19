<x-app-layout>
    <div class="space-y-6">
        
        <!-- Banner Verde -->
        <div class="p-8 rounded-3xl text-white shadow-md flex flex-col justify-between relative overflow-hidden border" style="background: linear-gradient(135deg, #3A5A40 0%, #2c4231 100%); min-height: 200px; border-color: #C59B27;">

            <!-- Contenido del Banner -->
            <div class="relative z-10 space-y-2">
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

    </div>
</x-app-layout>
