<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Entrada de Cajones (Secado)') }}
            </h2>
            <a href="{{ route('drawers_entrys.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start border-b border-gray-100 pb-6 mb-6 gap-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Número de Cajón</h3>
                        <p class="text-3xl font-black text-indigo-600">{{ $drawers_entry->number }}</p>
                    </div>
                    <div class="flex flex-col space-y-2 text-right">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                                Clase: {{ $drawers_entry->tobacco_class->name ?? $drawers_entry->tobacco_class->class_name ?? ('#' . $drawers_entry->tobacco_classes_id) }}
                            </span>
                        </div>
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                Recepción Secado: #{{ $drawers_entry->drying_reception_id }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha de Registro</h3>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($drawers_entry->date_registration)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>
                    <div class="bg-cyan-50 p-4 rounded-xl border border-cyan-100">
                        <h3 class="text-sm font-bold text-cyan-800 uppercase tracking-wider mb-1">Peso Húmedo</h3>
                        <p class="text-2xl font-black text-cyan-600">
                            {{ number_format($drawers_entry->weight_humedity, 2) }} <span class="text-sm font-normal text-cyan-500">lbs</span>
                        </p>
                    </div>
                </div>

                <!-- Datos de Horneado -->
                <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4">Detalles de Horneado (Opcional)</h3>
                
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="col-span-2">
                            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Control de Horno</h3>
                            <p class="text-base font-semibold text-gray-900">{{ $drawers_entry->control_oven ?: 'N/A' }}</p>
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Fecha de Ciclo</h3>
                            <p class="text-base font-semibold text-gray-900">{{ $drawers_entry->date_cycle ? \Carbon\Carbon::parse($drawers_entry->date_cycle)->format('d/m/Y') : 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Hora Inicio</h3>
                            <p class="text-base font-semibold text-gray-900">{{ $drawers_entry->start_time ? \Carbon\Carbon::parse($drawers_entry->start_time)->format('H:i') : 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Horas Prog.</h3>
                            <p class="text-base font-semibold text-gray-900">{{ $drawers_entry->scheduled_hours ?: 'N/A' }}</p>
                        </div>
                        <div class="col-span-2">
                            <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Temperatura Promedio</h3>
                            <p class="text-base font-semibold text-red-600">{{ $drawers_entry->average_temperature ? $drawers_entry->average_temperature . '°' : 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                @if($drawers_entry->observations)
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Observaciones</h3>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-gray-700">
                        {!! nl2br(e($drawers_entry->observations)) !!}
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
