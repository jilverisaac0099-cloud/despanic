<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Control de Horno') }}
            </h2>
            <a href="{{ route('oven_hornos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="mb-6 border-b border-gray-100 pb-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Recepción de Secado Asignada</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        Rec #{{ $oven_horno->drying_reception_id }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Hora de Inicio</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $oven_horno->start_time ? \Carbon\Carbon::parse($oven_horno->start_time)->format('h:i A') : 'N/A' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Hora de Fin</h3>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $oven_horno->end_time ? \Carbon\Carbon::parse($oven_horno->end_time)->format('h:i A') : 'N/A' }}
                        </p>
                    </div>

                    <div class="bg-cyan-50 p-4 rounded-xl border border-cyan-100">
                        <h3 class="text-sm font-bold text-cyan-800 uppercase tracking-wider mb-2">Horas Programadas</h3>
                        <p class="text-2xl font-black text-cyan-600">
                            {{ $oven_horno->scheduled_hours ?: 'N/A' }} <span class="text-sm font-normal text-cyan-500">hrs</span>
                        </p>
                    </div>

                    <div class="bg-red-50 p-4 rounded-xl border border-red-100">
                        <h3 class="text-sm font-bold text-red-800 uppercase tracking-wider mb-2">Temp Promedio</h3>
                        <p class="text-2xl font-black text-red-600">
                            {{ $oven_horno->average_temperature ? number_format($oven_horno->average_temperature, 2) . '°' : 'N/A' }}
                        </p>
                    </div>
                </div>

                @if($oven_horno->observations)
                <div class="mt-6 border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Observaciones</h3>
                    <div class="text-gray-700 text-sm">
                        {!! nl2br(e($oven_horno->observations)) !!}
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
