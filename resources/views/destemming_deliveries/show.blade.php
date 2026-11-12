<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Detalles de la Entrega de Despalillo') }}
            </h2>
            <a href="{{ route('destemming_deliveries.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-xl font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 border-b border-gray-100 dark:border-gray-700 pb-6">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Pilón de Destino</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                            {{ $destemming_delivery->pilon->number ?? ('Pilón #' . $destemming_delivery->pilon_id) }}
                        </span>
                    </div>

                    <div class="md:col-span-2 border-b border-gray-100 dark:border-gray-700 pb-6">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Preparación de Despalillo</h3>
                        <div class="bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl border border-gray-100 dark:border-gray-700 flex flex-col space-y-2">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">ID de Preparación: <span class="font-normal">#{{ $destemming_delivery->destemming_preparation_id }}</span></span>
                            @if($destemming_delivery->destemming_preparation)
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Fecha de Mojada: <span class="font-normal">{{ \Carbon\Carbon::parse($destemming_delivery->destemming_preparation->wet_date)->format('d/m/Y') }}</span></span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Libras Entrantes de Prep: <span class="font-normal">{{ number_format($destemming_delivery->destemming_preparation->pound_entry, 2) }} lbs</span></span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Fecha de Entrega</h3>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($destemming_delivery->delivery_date)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Bolsas Entregadas</h3>
                        <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                            {{ $destemming_delivery->bags_delivered }} <span class="text-sm text-gray-500 font-normal">bolsas</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
