<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Detalles del Cierre de Secado') }}
            </h2>
            <a href="{{ route('drying_closures.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start border-b border-gray-100 dark:border-gray-700 pb-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Recepción de Secado</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                            Rec #{{ $drying_closure->drying_reception_id }}
                        </span>
                    </div>
                    <div class="text-right mt-4 md:mt-0">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Estado Final</h3>
                        @php
                            $status = strtolower($drying_closure->final_status);
                            $bg = 'bg-gray-100 text-gray-800 border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600';
                            if(str_contains($status, 'aprobado') || str_contains($status, 'completado')) {
                                $bg = 'bg-emerald-100 text-emerald-800 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800';
                            } elseif (str_contains($status, 'rechazado') || str_contains($status, 'merma')) {
                                $bg = 'bg-red-100 text-red-800 border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800';
                            }
                        @endphp
                        <span class="inline-flex items-center px-4 py-1 border rounded-md text-sm font-bold uppercase tracking-widest {{ $bg }}">
                            {{ $drying_closure->final_status }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Fecha de Cierre</h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($drying_closure->date_cloused)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Fecha Extendida</h3>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $drying_closure->extended_date ? \Carbon\Carbon::parse($drying_closure->extended_date)->format('d/m/Y') : 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Fecha de Retiro</h3>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $drying_closure->pickup_date ? \Carbon\Carbon::parse($drying_closure->pickup_date)->format('d/m/Y') : 'N/A' }}
                        </p>
                    </div>
                </div>

                <h3 class="text-lg font-bold text-gray-900 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2 mb-4">Cálculos de Peso y Merma</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                        <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Peso Oro</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($drying_closure->weight_gold, 2) }} <span class="text-xs font-normal text-gray-500">lbs</span></p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                        <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Peso Húmedo</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($drying_closure->weight_damp, 2) }} <span class="text-xs font-normal text-gray-500">lbs</span></p>
                    </div>
                    <div class="bg-amber-50 dark:bg-amber-900/20 p-4 rounded-xl border border-amber-100 dark:border-amber-800/30">
                        <h3 class="text-xs font-bold text-amber-800 dark:text-amber-500 uppercase tracking-wider mb-1">Peso Seco</h3>
                        <p class="text-xl font-black text-amber-600 dark:text-amber-400">{{ number_format($drying_closure->weight_dry, 2) }} <span class="text-xs font-normal text-amber-500">lbs</span></p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700">
                        <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Peso Remanente</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ number_format($drying_closure->weight_remnant, 2) }} <span class="text-xs font-normal text-gray-500">lbs</span></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-red-50 dark:bg-red-900/10 p-5 rounded-xl border border-red-100 dark:border-red-800/30 flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-semibold text-red-800 dark:text-red-500 uppercase tracking-wider mb-1">Merma de Humedad</h3>
                            <p class="text-3xl font-black text-red-600 dark:text-red-400">{{ number_format($drying_closure->loss_humedity, 2) }} <span class="text-sm font-normal text-red-500">lbs perdidas</span></p>
                        </div>
                        <div class="text-right">
                            <h3 class="text-sm font-semibold text-red-800 dark:text-red-500 uppercase tracking-wider mb-1">% Merma</h3>
                            <p class="text-3xl font-black text-red-600 dark:text-red-400">{{ number_format($drying_closure->percentage_loss, 2) }}%</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-indigo-50 dark:bg-indigo-900/10 p-4 rounded-xl border border-indigo-100 dark:border-indigo-800/30 text-center flex flex-col justify-center">
                            <h3 class="text-xs font-bold text-indigo-800 dark:text-indigo-400 uppercase tracking-wider mb-1">Total de Pacas</h3>
                            <p class="text-3xl font-black text-indigo-600 dark:text-indigo-400">{{ $drying_closure->bales_total }}</p>
                        </div>
                        <div class="bg-cyan-50 dark:bg-cyan-900/10 p-4 rounded-xl border border-cyan-100 dark:border-cyan-800/30 text-center flex flex-col justify-center">
                            <h3 class="text-xs font-bold text-cyan-800 dark:text-cyan-400 uppercase tracking-wider mb-1">Horas Totales</h3>
                            <p class="text-3xl font-black text-cyan-600 dark:text-cyan-400">{{ number_format($drying_closure->hours_total, 1) }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
