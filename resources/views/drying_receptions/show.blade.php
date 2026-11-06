<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Recepción de Secado') }}
            </h2>
            <a href="{{ route('drying_receptions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="flex justify-between items-start border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Cierre de Despalillo</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                            Cierre #{{ $drying_reception->destemming_clousure_id }}
                        </span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Estado</h3>
                        @php
                            $statusLower = strtolower($drying_reception->status);
                            $bgClass = 'bg-gray-100 text-gray-800 border-gray-200';
                            if (str_contains($statusLower, 'pendiente')) {
                                $bgClass = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                            } elseif (str_contains($statusLower, 'proceso')) {
                                $bgClass = 'bg-blue-100 text-blue-800 border-blue-200';
                            } elseif (str_contains($statusLower, 'completado') || str_contains($statusLower, 'listo')) {
                                $bgClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
                            }
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 border rounded-md text-sm font-bold uppercase tracking-widest {{ $bgClass }}">
                            {{ $drying_reception->status ?: 'Pendiente' }}
                        </span>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha de Ingreso</h3>
                    <p class="text-xl font-bold text-gray-900">
                        {{ \Carbon\Carbon::parse($drying_reception->date_income)->format('d \d\e F \d\e Y') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div class="bg-amber-50 p-5 rounded-xl border border-amber-100">
                        <h3 class="text-sm font-semibold text-amber-800 uppercase tracking-wider mb-2">Peso Oro</h3>
                        <p class="text-3xl font-black text-amber-600">
                            {{ number_format($drying_reception->weigth_gold, 2) }} <span class="text-base font-normal text-amber-500/70">lbs</span>
                        </p>
                    </div>

                    <div class="bg-cyan-50 p-5 rounded-xl border border-cyan-100">
                        <h3 class="text-sm font-semibold text-cyan-800 uppercase tracking-wider mb-2">Peso Húmedo</h3>
                        <p class="text-3xl font-black text-cyan-600">
                            {{ number_format($drying_reception->weight_damp, 2) }} <span class="text-base font-normal text-cyan-500/70">lbs</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
