<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl leading-tight" style="color: #1F2E22;">
                    {{ __('Área de Pilones y Fermentación') }}
                </h2>
                <p class="text-sm mt-0.5" style="color: #5C6B5E;">
                    Control térmico, giros, eventos y orígenes del tabaco en pilón
                </p>
            </div>
            <span class="px-3.5 py-1.5 text-xs font-semibold rounded-xl border flex items-center gap-2" style="background-color: #E3EFE6; color: #1E6F43; border-color: #B8DEC3;">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                Área Activa
            </span>
        </div>
    </x-slot>

    <!-- Fondo general crema/dorado igual al Dashboard -->
    <div class="py-8 min-h-screen" style="background-color: #EDE0B8;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Grid de opciones del área de Pilones -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Opción 1: Gestión de Pilones -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Pilones Activos</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Administra la creación, estado actual y seguimiento de los pilones de fermentación en planta.</p>
                    </div>
                    <div>
                        <a href="{{ route('pilons.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Pilones →
                        </a>
                    </div>
                </div>

                <!-- Opción 2: Orígenes de Pilón -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Orígenes de Pilón</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Control y trazabilidad de la procedencia de los lotes que conforman cada pilón.</p>
                    </div>
                    <div>
                        <a href="{{ route('pilon_origins.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Ver Orígenes →
                        </a>
                    </div>
                </div>

                <!-- Opción 3: Registro de Eventos -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Eventos y Giros</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Registro de movimientos, volteos y eventos importantes durante el proceso de fermentación.</p>
                    </div>
                    <div>
                        <a href="{{ route('events.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Eventos →
                        </a>
                    </div>
                </div>

                <!-- Opción 4: Control de Temperaturas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Temperaturas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Monitoreo diario de los registros térmicos para asegurar la fermentación óptima del tabaco.</p>
                    </div>
                    <div>
                        <a href="{{ route('temperatures.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Control de Temperaturas →
                        </a>
                    </div>
                </div>

            </div>

            <!-- Enlace de retorno al Dashboard principal -->
            <div class="pt-2">
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold hover:underline inline-flex items-center gap-1.5" style="color: #2F4F38;">
                    ← Volver al Panel Principal
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
