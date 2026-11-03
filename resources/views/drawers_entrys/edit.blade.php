<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Editar Entrada de Cajones (Secado)') }}
            </h2>
            <a href="{{ route('drawers_entrys.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 p-8">
                
                <form action="{{ route('drawers_entrys.update', $drawers_entry->id) }}" method="POST" id="form-edit-{{ $drawers_entry->id }}" onsubmit="confirmarActualizacion(event, {{ $drawers_entry->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <!-- Información Principal -->
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mb-6">Información Principal</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Número de Cajón</label>
                            <input type="text" id="number" name="number" value="{{ old('number', $drawers_entry->number) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('number') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="date_registration" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Registro</label>
                            <input type="date" id="date_registration" name="date_registration" value="{{ old('date_registration', $drawers_entry->date_registration ? \Carbon\Carbon::parse($drawers_entry->date_registration)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('date_registration') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="drying_reception_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recepción de Secado</label>
                            <select id="drying_reception_id" name="drying_reception_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                                <option value="">-- Seleccione Recepción --</option>
                                @foreach($drying_receptions as $reception)
                                    <option value="{{ $reception->id }}" {{ old('drying_reception_id', $drawers_entry->drying_reception_id) == $reception->id ? 'selected' : '' }}>
                                        Rec #{{ $reception->id }} - {{ \Carbon\Carbon::parse($reception->date_income)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('drying_reception_id') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="tobacco_classes_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Clase de Tabaco</label>
                            <select id="tobacco_classes_id" name="tobacco_classes_id" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                                <option value="">-- Seleccione Clase --</option>
                                @foreach($tobacco_classes as $class)
                                    <option value="{{ $class->id }}" {{ old('tobacco_classes_id', $drawers_entry->tobacco_classes_id) == $class->id ? 'selected' : '' }}>
                                        {{ $class->name ?? $class->class_name ?? ('Clase #' . $class->id) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tobacco_classes_id') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="weight_humedity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Peso Húmedo (Lbs)</label>
                            <input type="number" step="0.01" id="weight_humedity" name="weight_humedity" value="{{ old('weight_humedity', $drawers_entry->weight_humedity) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('weight_humedity') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Detalles de Horneado (Opcionales) -->
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2 mt-8 mb-6">Detalles de Horneado (Opcional)</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="lg:col-span-2">
                            <label for="control_oven" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Control de Horno</label>
                            <input type="text" id="control_oven" name="control_oven" value="{{ old('control_oven', $drawers_entry->control_oven) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('control_oven') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="date_cycle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fecha de Ciclo</label>
                            <input type="date" id="date_cycle" name="date_cycle" value="{{ old('date_cycle', $drawers_entry->date_cycle ? \Carbon\Carbon::parse($drawers_entry->date_cycle)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('date_cycle') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Hora de Inicio</label>
                            <input type="time" id="start_time" name="start_time" value="{{ old('start_time', $drawers_entry->start_time ? \Carbon\Carbon::parse($drawers_entry->start_time)->format('H:i') : '') }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('start_time') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="scheduled_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Horas Prog.</label>
                            <input type="number" step="0.01" id="scheduled_hours" name="scheduled_hours" value="{{ old('scheduled_hours', $drawers_entry->scheduled_hours) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('scheduled_hours') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="average_temperature" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Temp Promedio (°F/°C)</label>
                            <input type="number" step="0.01" id="average_temperature" name="average_temperature" value="{{ old('average_temperature', $drawers_entry->average_temperature) }}" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">
                            @error('average_temperature') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="observations" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Observaciones</label>
                        <textarea id="observations" name="observations" rows="3" class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 shadow-sm transition-colors">{{ old('observations', $drawers_entry->observations) }}</textarea>
                        @error('observations') <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('drawers_entrys.index') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Entrada
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
                text: "Se actualizará la información de los cajones.",
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
