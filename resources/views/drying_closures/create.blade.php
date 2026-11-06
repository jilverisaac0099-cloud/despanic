<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Registrar Cierre de Secado') }}
            </h2>
            <a href="{{ route('drying_closures.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('drying_closures.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-6">Información General</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="md:col-span-3">
                            <label for="drying_reception_id" class="block text-sm font-medium text-gray-700 mb-2">Recepción de Secado</label>
                            <select id="drying_reception_id" name="drying_reception_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione Recepción --</option>
                                @foreach($drying_receptions as $reception)
                                    <option value="{{ $reception->id }}" {{ old('drying_reception_id') == $reception->id ? 'selected' : '' }}>
                                        Rec #{{ $reception->id }} - Ingreso: {{ \Carbon\Carbon::parse($reception->date_income)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('drying_reception_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="date_cloused" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Cierre</label>
                            <input type="date" id="date_cloused" name="date_cloused" value="{{ old('date_cloused') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('date_cloused') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="extended_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha Extendida (Opcional)</label>
                            <input type="date" id="extended_date" name="extended_date" value="{{ old('extended_date') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('extended_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="pickup_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Retiro (Opcional)</label>
                            <input type="date" id="pickup_date" name="pickup_date" value="{{ old('pickup_date') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('pickup_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-6">Pesos y Mermas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div>
                            <label for="weight_gold" class="block text-sm font-medium text-gray-700 mb-2">Peso Oro</label>
                            <input type="number" step="0.01" id="weight_gold" name="weight_gold" value="{{ old('weight_gold') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('weight_gold') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="weight_damp" class="block text-sm font-medium text-gray-700 mb-2">Peso Húmedo</label>
                            <input type="number" step="0.01" id="weight_damp" name="weight_damp" value="{{ old('weight_damp') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('weight_damp') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="weight_dry" class="block text-sm font-medium text-gray-700 mb-2">Peso Seco</label>
                            <input type="number" step="0.01" id="weight_dry" name="weight_dry" value="{{ old('weight_dry') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('weight_dry') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="weight_remnant" class="block text-sm font-medium text-gray-700 mb-2">Peso Remanente</label>
                            <input type="number" step="0.01" id="weight_remnant" name="weight_remnant" value="{{ old('weight_remnant') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('weight_remnant') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="loss_humedity" class="block text-sm font-medium text-gray-700 mb-2">Merma de Humedad (Lbs)</label>
                            <input type="number" step="0.01" id="loss_humedity" name="loss_humedity" value="{{ old('loss_humedity') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('loss_humedity') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="percentage_loss" class="block text-sm font-medium text-gray-700 mb-2">Porcentaje de Merma (%)</label>
                            <input type="number" step="0.01" id="percentage_loss" name="percentage_loss" value="{{ old('percentage_loss') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="0.00">
                            @error('percentage_loss') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-200 pb-2 mb-6">Resultados Finales</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="bales_total" class="block text-sm font-medium text-gray-700 mb-2">Total de Pacas</label>
                            <input type="number" id="bales_total" name="bales_total" value="{{ old('bales_total') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="Ej. 25">
                            @error('bales_total') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="hours_total" class="block text-sm font-medium text-gray-700 mb-2">Horas Totales</label>
                            <input type="number" step="0.01" id="hours_total" name="hours_total" value="{{ old('hours_total') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="Ej. 120.5">
                            @error('hours_total') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="final_status" class="block text-sm font-medium text-gray-700 mb-2">Estado Final</label>
                            <input type="text" id="final_status" name="final_status" value="{{ old('final_status') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors" placeholder="Ej. Completado, Aprobado...">
                            @error('final_status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('drying_closures.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Cierre
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
