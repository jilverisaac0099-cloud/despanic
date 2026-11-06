<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Composición de Paca') }}
            </h2>
            <a href="{{ route('bale_compositions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
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
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Paca de Destino</h3>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-lg font-black bg-indigo-50 text-indigo-700 border border-indigo-100 tracking-widest font-mono">
                            {{ $bale_composition->bale_drying->bale_code ?? ('Paca #' . $bale_composition->bale_drying_id) }}
                        </span>
                    </div>
                    <div class="text-right mt-4 md:mt-0">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Recepción de Secado</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-100 text-blue-800">
                            Rec #{{ $bale_composition->drying_reception_id }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-emerald-50 p-5 rounded-xl border border-emerald-100">
                        <h3 class="text-sm font-semibold text-emerald-800 uppercase tracking-wider mb-2">Libras Aportadas</h3>
                        <p class="text-3xl font-black text-emerald-600">
                            {{ number_format($bale_composition->pounds_contributed, 2) }} <span class="text-base font-normal text-emerald-500/70">lbs</span>
                        </p>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Remanente</h3>
                        <p class="text-3xl font-black text-gray-900">
                            {{ number_format($bale_composition->remant, 2) }} <span class="text-base font-normal text-gray-500">lbs</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
