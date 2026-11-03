<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Registrar Vena de Despalillo') }}
            </h2>
            <a href="{{ route('vein_destemmings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('vein_destemmings.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="mb-6">
                        <label for="pilon_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilón</label>
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
                        <label for="date_weighing" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Pesaje</label>
                        <input type="date" id="date_weighing" name="date_weighing" value="{{ old('date_weighing') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date_weighing')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="amount_bags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cantidad de Sacos</label>
                        <input type="number" id="amount_bags" name="amount_bags" value="{{ old('amount_bags') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 25">
                        @error('amount_bags')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="total_pounds" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Libras Totales</label>
                        <input type="number" step="0.01" id="total_pounds" name="total_pounds" value="{{ old('total_pounds') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 1250.50">
                        @error('total_pounds')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="vein_destemming" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Detalles / Tipo de Vena (Opcional)</label>
                        <input type="text" id="vein_destemming" name="vein_destemming" value="{{ old('vein_destemming') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Información adicional del despalillo">
                        @error('vein_destemming')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('vein_destemmings.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Registro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
