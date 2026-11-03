<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Editar Composición de Paca') }}
            </h2>
            <a href="{{ route('bale_compositions.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('bale_compositions.update', $bale_composition->id) }}" method="POST" id="form-edit-{{ $bale_composition->id }}" onsubmit="confirmarActualizacion(event, {{ $bale_composition->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="md:col-span-2">
                            <label for="bale_drying_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Paca de Destino</label>
                            <select id="bale_drying_id" name="bale_drying_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione una Paca --</option>
                                @foreach($bale_dryings as $paca)
                                    <option value="{{ $paca->id }}" {{ old('bale_drying_id', $bale_composition->bale_drying_id) == $paca->id ? 'selected' : '' }}>
                                        Paca: {{ $paca->bale_code }} - Peso: {{ $paca->net_weight }} lbs
                                    </option>
                                @endforeach
                            </select>
                            @error('bale_drying_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="drying_reception_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recepción de Secado (Origen)</label>
                            <select id="drying_reception_id" name="drying_reception_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione Recepción --</option>
                                @foreach($drying_receptions as $reception)
                                    <option value="{{ $reception->id }}" {{ old('drying_reception_id', $bale_composition->drying_reception_id) == $reception->id ? 'selected' : '' }}>
                                        Rec #{{ $reception->id }} - Fecha: {{ \Carbon\Carbon::parse($reception->date_income)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('drying_reception_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pounds_contributed" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Libras Aportadas</label>
                            <input type="number" step="0.01" id="pounds_contributed" name="pounds_contributed" value="{{ old('pounds_contributed', $bale_composition->pounds_contributed) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('pounds_contributed')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="remant" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Remanente (Lbs)</label>
                            <input type="number" step="0.01" id="remant" name="remant" value="{{ old('remant', $bale_composition->remant) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('remant')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('bale_compositions.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Composición
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
                text: "Se actualizará la información de la composición de la paca.",
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
