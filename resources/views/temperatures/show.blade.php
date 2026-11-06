<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalles de Temperatura') }}
            </h2>
            <a href="{{ route('temperatures.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 border-b border-gray-100 pb-6">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pilón</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                            {{ $temperature->pilon->number ?? ('Pilón #' . $temperature->pilon_id) }}
                        </span>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Fecha y Hora</h3>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($temperature->date_time)->format('d \d\e F \d\e Y, h:i A') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Temperatura</h3>
                        <div class="inline-flex items-center">
                            <p class="text-3xl font-bold {{ $temperature->temperature_fahrenheit > 100 ? 'text-red-500' : 'text-emerald-500' }}">
                                {{ number_format($temperature->temperature_fahrenheit, 2) }} <span class="text-lg font-normal text-gray-500">°F</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
