<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl leading-tight" style="color: #1F2E22;">
                    {{ __('Área de Despalillo') }}
                </h2>
                <p class="text-sm mt-0.5" style="color: #5C6B5E;">
                    Control de preparaciones, operarios, entregas, clases de tabaco y cierres de área
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

            <!-- Grid de opciones del área de Despalillo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Opción 1: Preparaciones -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Preparaciones</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Gestión inicial y acondicionamiento de hojas de tabaco para el proceso de despalillo.</p>
                    </div>
                    <div>
                        <a href="{{ route('destemming_preparations.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Preparaciones →
                        </a>
                    </div>
                </div>

                <!-- Opción 2: Empleados -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Empleados</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Control de operarios activos, asignación de mesas y seguimiento de rendimiento.</p>
                    </div>
                    <div>
                        <a href="{{ route('employees.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Ver Empleados →
                        </a>
                    </div>
                </div>

                <!-- Opción 3: Entregas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Entregas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Registro y control diario de las entregas de materia prima realizadas por operario.</p>
                    </div>
                    <div>
                        <a href="{{ route('destemming_deliveries.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Entregas →
                        </a>
                    </div>
                </div>

                <!-- Opción 4: Clases de Tabaco -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Clases de Tabaco</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Catálogo y clasificación de los distintos tipos, cortes y calidades de hoja.</p>
                    </div>
                    <div>
                        <a href="{{ route('tobacco_classes.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Ver Clases de Tabaco →
                        </a>
                    </div>
                </div>

                <!-- Opción 5: Detallado -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Detallado</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Desglose específico, pesos obtenidos y detalles técnicos de los procesos de despalillo.</p>
                    </div>
                    <div>
                        <a href="{{ route('detailed_destemmings.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Abrir Detallado →
                        </a>
                    </div>
                </div>

                <!-- Opción 6: Gavetas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Gavetas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Control de inventario, asignación y flujo de gavetas de tabaco despalillado.</p>
                    </div>
                    <div>
                        <a href="{{ route('destemming_drawers.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Gavetas →
                        </a>
                    </div>
                </div>

                <!-- Opción 7: Venas -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Venas</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Control de pesaje, merma y seguimiento del subproducto de venas extraídas.</p>
                    </div>
                    <div>
                        <a href="{{ route('vein_destemmings.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Control de Venas →
                        </a>
                    </div>
                </div>

                <!-- Opción 8: Cierres -->
                <div class="overflow-hidden shadow-sm sm:rounded-2xl p-6 border transition hover:shadow-md flex flex-col justify-between" style="background-color: #F6EBCB; border-color: #D4C392;">
                    <div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background-color: #2F4F3818; color: #2F4F38;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold mb-1" style="color: #1F2E22;">Cierres</h3>
                        <p class="text-xs mb-6" style="color: #5C6B5E;">Consolidación de resultados y cierre de operaciones del área de despalillo.</p>
                    </div>
                    <div>
                        <a href="{{ route('destemming_closures.index') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 text-white text-sm font-semibold rounded-xl transition hover:opacity-90 shadow-sm" style="background-color: #2F4F38;">
                            Gestionar Cierres →
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
