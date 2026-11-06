<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles del Secado de Paca') }}
            </h2>
            <a href="{{ route('bale_dryings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start border-b border-gray-100 pb-6 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Código de Paca</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-lg font-black bg-indigo-50 text-indigo-700 border border-indigo-100 tracking-widest font-mono">
                            {{ $bale_drying->bale_code }}
                        </span>
                    </div>
                    <div class="text-right mt-4 md:mt-0">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha de Empacado</h3>
                        <p class="text-lg font-bold text-gray-900">
                            {{ \Carbon\Carbon::parse($bale_drying->packaging_date)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Clase de Tabaco</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-emerald-100 text-emerald-800">
                            {{ $bale_drying->tobacco_class->name ?? $bale_drying->tobacco_class->class_name ?? ('Clase #' . $bale_drying->tobacco_classes_id) }}
                        </span>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Peso Neto</h3>
                        <p class="text-3xl font-black text-gray-900">
                            {{ number_format($bale_drying->net_weight, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
