<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Empaque de Paca') }}
            </h2>
            <a href="{{ route('bale_packagings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
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
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Número de Paca</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-2xl font-black bg-indigo-50 text-indigo-700 border border-indigo-100 tracking-widest font-mono">
                            {{ $bale_packaging->bale_number }}
                        </span>
                    </div>
                    <div class="flex flex-col text-right space-y-2">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                                Paca (Secado): {{ $bale_packaging->bale_drying->bale_code ?? ('#' . $bale_packaging->bale_drying_id) }}
                            </span>
                        </div>
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-bold uppercase tracking-wider bg-gray-100 text-gray-800">
                                Estado: {{ $bale_packaging->status_bale }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Clase de Tabaco</h3>
                        <p class="text-lg font-bold text-gray-900">{{ $bale_packaging->class_name }}</p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Procedencia</h3>
                        <p class="text-lg font-bold text-gray-900">{{ $bale_packaging->provenance }}</p>
                    </div>
                    <div>
                        <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Pilón de Origen</h3>
                        <p class="text-lg font-bold text-gray-900">{{ $bale_packaging->pylon_origin ?: 'N/A' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-emerald-50 p-5 rounded-xl border border-emerald-100">
                        <h3 class="text-sm font-semibold text-emerald-800 uppercase tracking-wider mb-2">Peso Neto</h3>
                        <p class="text-3xl font-black text-emerald-600">
                            {{ number_format($bale_packaging->net_weight, 2) }} <span class="text-base font-normal text-emerald-500">lbs</span>
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Fecha de Empacado</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \Carbon\Carbon::parse($bale_packaging->packing_date)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Fecha de Registro</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ \Carbon\Carbon::parse($bale_packaging->registration_date)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
