<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles del Cierre de Despalillo') }}
            </h2>
            <a href="{{ route('destemming_clousures.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="flex justify-between items-center border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pilón Asociado</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-amber-100 text-amber-800">
                            {{ $destemming_clousure->pilon->number ?? ('Pilón #' . $destemming_clousure->pilon_id) }}
                        </span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha de Cierre</h3>
                        <p class="text-xl font-bold text-gray-900">
                            {{ \Carbon\Carbon::parse($destemming_clousure->date_clousure)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>
                </div>

                <!-- Grid de Pesos -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-indigo-50 p-5 rounded-xl border border-indigo-100 text-center">
                        <h3 class="text-sm font-semibold text-indigo-800 uppercase tracking-wider mb-2">Peso Oro</h3>
                        <p class="text-3xl font-black text-indigo-600">
                            {{ number_format($destemming_clousure->peso_gold, 2) }} <span class="text-base font-normal text-indigo-400">lbs</span>
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 text-center">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Picadura</h3>
                        <p class="text-3xl font-bold text-gray-900">
                            {{ number_format($destemming_clousure->total_sting, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 text-center">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Vena</h3>
                        <p class="text-3xl font-bold text-gray-900">
                            {{ number_format($destemming_clousure->total_vein, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
