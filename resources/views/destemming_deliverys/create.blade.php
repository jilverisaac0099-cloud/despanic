<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Registrar Entrega de Despalillo') }}
            </h2>
            <a href="{{ route('destemming_deliverys.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('destemming_deliverys.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="mb-6">
                        <label for="pilon_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilón de Destino</label>
                        <select id="pilon_id" name="pilon_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un Pilón --</option>
                            @foreach($pilons as $pilon)
                                <option value="{{ $pilon->id }}" {{ old('pilon_id') == $pilon->id ? 'selected' : '' }}>
                                    {{ $pilon->number ?? ('Pilón #' . $pilon->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('pilon_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="destemming_preparation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preparación de Despalillo </label>
                        <select id="destemming_preparation_id" name="destemming_preparation_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione una Preparación --</option>
                            @foreach($destemming_preparations as $prep)
                                <option value="{{ $prep->id }}" {{ old('destemming_preparation_id') == $prep->id ? 'selected' : '' }}>
                                    Prep #{{ $prep->id }} - Fecha Mojada: {{ \Carbon\Carbon::parse($prep->wet_date)->format('d/m/Y') }}
                                </option>
                            @endforeach
                        </select>
                        @error('destemming_preparation_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="delivery_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Entrega</label>
                        <input type="date" id="delivery_date" name="delivery_date" value="{{ old('delivery_date') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('delivery_date')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="bags_delivered" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bolsas Entregadas</label>
                        <input type="number" id="bags_delivered" name="bags_delivered" value="{{ old('bags_delivered') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 10">
                        @error('bags_delivered')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('destemming_deliverys.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Entrega
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
