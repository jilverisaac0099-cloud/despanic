<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl leading-tight" style="color: #1F2E22;">
                    {{ __('Área de Recepción de Materia Prima') }}
                </h2>
                <p class="text-sm mt-0.5" style="color: #1F2E22;">
                    Gestión de lotes, proveedores y especificaciones que ingresan a planta
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

            <!-- Grid de opciones del área de Recepción -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Opción 1: Recepción de Lotes -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Recepción de Lotes</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Administra los registros principales de lotes recibidos, proveedores y libras.</p>
                    </div>
                    <div>
                        <a href="{{ route('lots_receptions.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Abrir Recepción de Lotes →
                        </a>
                    </div>
                </div>

                <!-- Opción 2: Detalles de Lotes -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Detalles de Lotes</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Gestiona la información detallada, especificaciones y características de los lotes.</p>
                    </div>
                    <div>
                        <a href="{{ route('lots_details.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Abrir Detalles de Lotes →
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

