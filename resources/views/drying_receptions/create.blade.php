<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Registrar Recepción de Secado') }}
            </h2>
            <a href="{{ route('drying_receptions.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('drying_receptions.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="mb-6">
                        <label for="destemming_clousure_id" class="block text-sm font-medium text-gray-700 mb-2">Cierre de Despalillo</label>
                        <select id="destemming_clousure_id" name="destemming_clousure_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un Cierre --</option>
                            @foreach($destemming_clousures as $clousure)
                                <option value="{{ $clousure->id }}" {{ old('destemming_clousure_id') == $clousure->id ? 'selected' : '' }}>
                                    Cierre #{{ $clousure->id }} - Pilón: {{ $clousure->pilon->number ?? $clousure->pilon_id }}
                                </option>
                            @endforeach
                        </select>
                        @error('destemming_clousure_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date_income" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Ingreso</label>
                        <input type="date" id="date_income" name="date_income" value="{{ old('date_income') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date_income')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="weigth_gold" class="block text-sm font-medium text-gray-700 mb-2">Peso Oro (Lbs)</label>
                            <input type="number" step="0.01" id="weigth_gold" name="weigth_gold" value="{{ old('weigth_gold') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 800.50">
                            @error('weigth_gold')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="weight_damp" class="block text-sm font-medium text-gray-700 mb-2">Peso Húmedo (Lbs)</label>
                            <input type="number" step="0.01" id="weight_damp" name="weight_damp" value="{{ old('weight_damp') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. 950.00">
                            @error('weight_damp')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                        <select id="status" name="status" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En Proceso" {{ old('status') == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ old('status') == 'Completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('drying_receptions.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Recepción
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
