<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Editar Despalillo Detallado') }}
            </h2>
            <a href="{{ route('detailed_destemmings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('detailed_destemmings.update', $detailed_destemming->id) }}" method="POST" id="form-edit-{{ $detailed_destemming->id }}" onsubmit="confirmarActualizacion(event, {{ $detailed_destemming->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="destemming_delivery_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Entrega de Despalillo</label>
                            <select id="destemming_delivery_id" name="destemming_delivery_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione Entrega --</option>
                                @foreach($destemming_deliverys as $delivery)
                                    <option value="{{ $delivery->id }}" {{ old('destemming_delivery_id', $detailed_destemming->destemming_delivery_id) == $delivery->id ? 'selected' : '' }}>
                                        Entrega #{{ $delivery->id }} - {{ \Carbon\Carbon::parse($delivery->delivery_date)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('destemming_delivery_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tobacco_classes_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Clase de Tabaco</label>
                            <select id="tobacco_classes_id" name="tobacco_classes_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                                <option value="">-- Seleccione Clase --</option>
                                @foreach($tobacco_classes as $class)
                                    <option value="{{ $class->id }}" {{ old('tobacco_classes_id', $detailed_destemming->tobacco_classes_id) == $class->id ? 'selected' : '' }}>
                                        {{ $class->name ?? $class->class_name ?? ('Clase #' . $class->id) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tobacco_classes_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="registration_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Registro</label>
                        <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', $detailed_destemming->registration_date ? \Carbon\Carbon::parse($detailed_destemming->registration_date)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('registration_date')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="detailed_week" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Semana Detallada (Opcional)</label>
                            <input type="text" id="detailed_week" name="detailed_week" value="{{ old('detailed_week', $detailed_destemming->detailed_week) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('detailed_week')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="days" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cantidad de Días</label>
                            <input type="number" id="days" name="days" value="{{ old('days', $detailed_destemming->days) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('days')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="pounds_tripe" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Libras de Tripa</label>
                            <input type="number" step="0.01" id="pounds_tripe" name="pounds_tripe" value="{{ old('pounds_tripe', $detailed_destemming->pounds_tripe) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('pounds_tripe')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pounds_sting" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Libras de Picadura</label>
                            <input type="number" step="0.01" id="pounds_sting" name="pounds_sting" value="{{ old('pounds_sting', $detailed_destemming->pounds_sting) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('pounds_sting')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('detailed_destemmings.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
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
                text: "Se actualizará la información del despalillo detallado.",
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
