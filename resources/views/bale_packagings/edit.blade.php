<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Editar Empaque de Paca') }}
            </h2>
            <a href="{{ route('bale_packagings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('bale_packagings.update', $bale_packaging->id) }}" method="POST" id="form-edit-{{ $bale_packaging->id }}" onsubmit="confirmarActualizacion(event, {{ $bale_packaging->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="md:col-span-2">
                            <label for="bale_drying_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recepcion de Secado</label>
                            <select id="bale_drying_id" name="bale_drying_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione un Registro de Secado --</option>
                                @foreach($bale_dryings as $paca)
                                    <option value="{{ $paca->id }}" {{ old('bale_drying_id', $bale_packaging->bale_drying_id) == $paca->id ? 'selected' : '' }}>
                                        Secado: {{ $paca->bale_code }} - Peso: {{ number_format($paca->net_weight, 2) }} lbs
                                    </option>
                                @endforeach
                            </select>
                            @error('bale_drying_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="bale_number" class="block text-sm font-medium text-gray-700 mb-2">Número de Paca (Empaque)</label>
                            <input type="text" id="bale_number" name="bale_number" value="{{ old('bale_number', $bale_packaging->bale_number) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 font-mono shadow-sm transition-colors">
                            @error('bale_number') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="class_name" class="block text-sm font-medium text-gray-700 mb-2">Clase de Tabaco</label>
                            <input type="text" id="class_name" name="class_name" value="{{ old('class_name', $bale_packaging->class_name) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('class_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="packing_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Empacado</label>
                            <input type="date" id="packing_date" name="packing_date" value="{{ old('packing_date', $bale_packaging->packing_date ? \Carbon\Carbon::parse($bale_packaging->packing_date)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('packing_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="registration_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Registro</label>
                            <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', $bale_packaging->registration_date ? \Carbon\Carbon::parse($bale_packaging->registration_date)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('registration_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="provenance" class="block text-sm font-medium text-gray-700 mb-2">Procedencia</label>
                            <input type="text" id="provenance" name="provenance" value="{{ old('provenance', $bale_packaging->provenance) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('provenance') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="pylon_origin" class="block text-sm font-medium text-gray-700 mb-2">Pilón de Origen (Opcional)</label>
                            <input type="text" id="pylon_origin" name="pylon_origin" value="{{ old('pylon_origin', $bale_packaging->pylon_origin) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('pylon_origin') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="net_weight" class="block text-sm font-medium text-gray-700 mb-2">Peso Neto (Lbs)</label>
                            <input type="number" step="0.01" id="net_weight" name="net_weight" value="{{ old('net_weight', $bale_packaging->net_weight) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('net_weight') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="status_bale" class="block text-sm font-medium text-gray-700 mb-2">Estado de Paca</label>
                            <input type="text" id="status_bale" name="status_bale" value="{{ old('status_bale', $bale_packaging->status_bale) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 shadow-sm transition-colors">
                            @error('status_bale') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('bale_packagings.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Empaque
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
                text: "Se actualizará la información del empaque.",
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
