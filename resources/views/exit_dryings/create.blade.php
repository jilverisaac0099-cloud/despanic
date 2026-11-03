<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Registrar Salida de Secado') }}
            </h2>
            <a href="{{ route('exit_dryings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('exit_dryings.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="md:col-span-2">
                            <label for="pickup_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Retiro / Salida</label>
                            <input type="date" id="pickup_date" name="pickup_date" value="{{ old('pickup_date') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('pickup_date')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="drying_reception_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recepción de Secado Asignada</label>
                            <select id="drying_reception_id" name="drying_reception_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione una Recepción --</option>
                                @foreach($drying_receptions as $reception)
                                    <option value="{{ $reception->id }}" {{ old('drying_reception_id') == $reception->id ? 'selected' : '' }}>
                                        Rec #{{ $reception->id }} - Ingreso: {{ \Carbon\Carbon::parse($reception->date_income)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('drying_reception_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tobacco_classes_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Clase de Tabaco</label>
                            <select id="tobacco_classes_id" name="tobacco_classes_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione Clase --</option>
                                @foreach($tobacco_classes as $class)
                                    <option value="{{ $class->id }}" {{ old('tobacco_classes_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name ?? $class->class_name ?? ('Clase #' . $class->id) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tobacco_classes_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="humedity_weight_entry" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peso Húmedo de Entrada (Lbs)</label>
                            <input type="number" step="0.01" id="humedity_weight_entry" name="humedity_weight_entry" value="{{ old('humedity_weight_entry') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 1000.50">
                            @error('humedity_weight_entry')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="weight_dry_exit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peso Seco de Salida (Lbs)</label>
                            <input type="number" step="0.01" id="weight_dry_exit" name="weight_dry_exit" value="{{ old('weight_dry_exit') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 750.25">
                            @error('weight_dry_exit')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="quantity_bale" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cantidad de Pacas</label>
                            <input type="number" id="quantity_bale" name="quantity_bale" value="{{ old('quantity_bale') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 15">
                            @error('quantity_bale')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="remnat_weight" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peso Remanente (Lbs)</label>
                            <input type="number" step="0.01" id="remnat_weight" name="remnat_weight" value="{{ old('remnat_weight') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 15.00">
                            @error('remnat_weight')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('exit_dryings.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Salida
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
