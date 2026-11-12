<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl leading-tight" style="color: #1F2E22;">
                    {{ __('Área de Empaque y Pacas') }}
                </h2>
                <p class="text-sm mt-0.5" style="color: #5C6B5E;">
                    Registro final de empaque para exportación, composición de mezclas y control de secado
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

            <!-- Grid de opciones del área de Empaque y Pacas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Opción 1: Empaque de Pacas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Empaque de Pacas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Registro final, control de pesos y empaque de producto terminado para exportación.</p>
                    </div>
                    <div>
                        <a href="{{ route('bale_packagings.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Empaque →
                        </a>
                    </div>
                </div>

                <!-- Opción 2: Composición de Pacas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Composición de Pacas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Control detallado de mezclas, clases de tabaco y proporciones que componen cada paca.</p>
                    </div>
                    <div>
                        <a href="{{ route('bale_compositions.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Ver Composición →
                        </a>
                    </div>
                </div>

                <!-- Opción 3: Secado de Pacas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Secado de Pacas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Monitoreo térmico y control de seguimiento de secado para las pacas ya armadas.</p>
                    </div>
                    <div>
                        <a href="{{ route('bale_dryings.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Control de Secado →
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
