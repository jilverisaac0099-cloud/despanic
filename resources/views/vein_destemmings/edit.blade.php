<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Editar Vena de Despalillo') }}
            </h2>
            <a href="{{ route('vein_destemmings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('vein_destemmings.update', $vein_destemming->id) }}" method="POST" id="form-edit-{{ $vein_destemming->id }}" onsubmit="confirmarActualizacion(event, {{ $vein_destemming->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="pilon_id" class="block text-sm font-medium text-gray-700 mb-2">Pilón</label>
                        <select id="pilon_id" name="pilon_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un Pilón --</option>
                            @foreach($pilons as $pilon)
                                <option value="{{ $pilon->id }}" {{ old('pilon_id', $vein_destemming->pilon_id) == $pilon->id ? 'selected' : '' }}>
                                    {{ $pilon->number ?? ('Pilón #' . $pilon->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('pilon_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date_weighing" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Pesaje</label>
                        <input type="date" id="date_weighing" name="date_weighing" value="{{ old('date_weighing', $vein_destemming->date_weighing ? \Carbon\Carbon::parse($vein_destemming->date_weighing)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date_weighing')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="amount_bags" class="block text-sm font-medium text-gray-700 mb-2">Cantidad de Sacos</label>
                        <input type="number" id="amount_bags" name="amount_bags" value="{{ old('amount_bags', $vein_destemming->amount_bags) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('amount_bags')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="total_pounds" class="block text-sm font-medium text-gray-700 mb-2">Libras Totales</label>
                        <input type="number" step="0.01" id="total_pounds" name="total_pounds" value="{{ old('total_pounds', $vein_destemming->total_pounds) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('total_pounds')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="vein_destemming" class="block text-sm font-medium text-gray-700 mb-2">Detalles / Tipo de Vena (Opcional)</label>
                        <input type="text" id="vein_destemming" name="vein_destemming" value="{{ old('vein_destemming', $vein_destemming->vein_destemming) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('vein_destemming')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('vein_destemmings.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Registro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function confirmarActualizacion(event, id) {
            event.preventDefault(); 
            Swal.fire({
                title: '¿Guardar los cambios?',
                text: "Se actualizará la información del despalillo.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                customClass: { popup: 'rounded-2xl border border-gray-700' }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-edit-' + id).submit(); 
                }
            })
        }
    </script>
</x-app-layout>
