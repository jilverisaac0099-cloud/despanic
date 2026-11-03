<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Editar Cierre de Despalillo') }}
            </h2>
            <a href="{{ route('destemming_clousures.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('destemming_clousures.update', $destemming_clousure->id) }}" method="POST" id="form-edit-{{ $destemming_clousure->id }}" onsubmit="confirmarActualizacion(event, {{ $destemming_clousure->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="pilon_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilón</label>
                        <select id="pilon_id" name="pilon_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un Pilón --</option>
                            @foreach($pilons as $pilon)
                                <option value="{{ $pilon->id }}" {{ old('pilon_id', $destemming_clousure->pilon_id) == $pilon->id ? 'selected' : '' }}>
                                    {{ $pilon->number ?? ('Pilón #' . $pilon->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('pilon_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date_clousure" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Cierre</label>
                        <input type="date" id="date_clousure" name="date_clousure" value="{{ old('date_clousure', $destemming_clousure->date_clousure ? \Carbon\Carbon::parse($destemming_clousure->date_clousure)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date_clousure')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="peso_gold" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peso Oro (Lbs)</label>
                            <input type="number" step="0.01" id="peso_gold" name="peso_gold" value="{{ old('peso_gold', $destemming_clousure->peso_gold) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('peso_gold')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="total_sting" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Picadura (Lbs)</label>
                            <input type="number" step="0.01" id="total_sting" name="total_sting" value="{{ old('total_sting', $destemming_clousure->total_sting) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('total_sting')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="total_vein" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Vena (Lbs)</label>
                            <input type="number" step="0.01" id="total_vein" name="total_vein" value="{{ old('total_vein', $destemming_clousure->total_vein) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('total_vein')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('destemming_clousures.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Cierre
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
                text: "Se actualizará la información del cierre.",
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
