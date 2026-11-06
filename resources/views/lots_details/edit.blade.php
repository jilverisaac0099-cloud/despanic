<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Editar Detalle de Lote') }}
            </h2>
            <a href="{{ route('lots_details.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('lots_details.update', $lot_detail->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="lots_reception_id" class="block text-sm font-medium text-gray-700 mb-2">Recepción de Lote</label>
                        <select id="lots_reception_id" name="lots_reception_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione una recepción --</option>
                            @foreach($lots_receptions as $lots_reception)
                                <option value="{{ $lots_reception->id }}" {{ old('lots_reception_id', $lot_detail->lots_reception_id) == $lots_reception->id ? 'selected' : '' }}>
                                    {{ $lots_reception->lot_number ?? $lots_reception->code ?? ('Recepción #' . $lots_reception->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('lots_reception_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="cut_number" class="block text-sm font-medium text-gray-700 mb-2">Número de Corte</label>
                        <input type="text" id="cut_number" name="cut_number" value="{{ old('cut_number', $lot_detail->cut_number) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('cut_number')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="pounds" class="block text-sm font-medium text-gray-700 mb-2">Libras</label>
                        <input type="number" step="0.01" id="pounds" name="pounds" value="{{ old('pounds', $lot_detail->pounds) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('pounds')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="quality" class="block text-sm font-medium text-gray-700 mb-2">Calidad</label>
                        <input type="text" id="quality" name="quality" value="{{ old('quality', $lot_detail->quality) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('quality')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('lots_details.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Detalle
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
