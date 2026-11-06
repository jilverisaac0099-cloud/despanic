<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Salida de Secado') }}
            </h2>
            <a href="{{ route('exit_dryings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
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
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Recepción Secado</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                            Rec #{{ $exit_drying->drying_reception_id }}
                        </span>
                    </div>
                    <div class="text-right">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha de Retiro / Salida</h3>
                        <p class="text-xl font-bold text-gray-900">
                            {{ \Carbon\Carbon::parse($exit_drying->pickup_date)->format('d \d\e F \d\e Y') }}
                        </p>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Clase de Tabaco</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-emerald-100 text-emerald-800">
                        {{ $exit_drying->tobacco_class->name ?? $exit_drying->tobacco_class->class_name ?? ('Clase #' . $exit_drying->tobacco_classes_id) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Peso Húmedo de Entrada</h3>
                        <p class="text-2xl font-bold text-cyan-600">
                            {{ number_format($exit_drying->humedity_weight_entry, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>

                    <div class="bg-amber-50 p-5 rounded-xl border border-amber-100">
                        <h3 class="text-sm font-semibold text-amber-800 uppercase tracking-wider mb-2">Peso Seco de Salida</h3>
                        <p class="text-2xl font-black text-amber-600">
                            {{ number_format($exit_drying->weight_dry_exit, 2) }} <span class="text-base font-normal text-amber-500/70">lbs</span>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Cantidad de Pacas</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $exit_drying->quantity_bale }} <span class="text-base font-normal text-gray-500">pacas</span>
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Peso Remanente</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ number_format($exit_drying->remnat_weight, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
