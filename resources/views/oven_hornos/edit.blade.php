<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Editar Control de Horno') }}
            </h2>
            <a href="{{ route('oven_hornos.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('oven_hornos.update', $oven_horno->id) }}" method="POST" id="form-edit-{{ $oven_horno->id }}" onsubmit="confirmarActualizacion(event, {{ $oven_horno->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="drying_reception_id" class="block text-sm font-medium text-gray-700 mb-2">Recepción de Secado</label>
                        <select id="drying_reception_id" name="drying_reception_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione una Recepción --</option>
                            @foreach($drying_receptions as $reception)
                                <option value="{{ $reception->id }}" {{ old('drying_reception_id', $oven_horno->drying_reception_id) == $reception->id ? 'selected' : '' }}>
                                    Rec #{{ $reception->id }} - Fecha Ingreso: {{ \Carbon\Carbon::parse($reception->date_income)->format('d/m/Y') }}
                                </option>
                            @endforeach
                        </select>
                        @error('drying_reception_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Hora de Inicio (Opcional)</label>
                            <input type="time" id="start_time" name="start_time" value="{{ old('start_time', $oven_horno->start_time ? \Carbon\Carbon::parse($oven_horno->start_time)->format('H:i') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('start_time') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">Hora de Fin (Opcional)</label>
                            <input type="time" id="end_time" name="end_time" value="{{ old('end_time', $oven_horno->end_time ? \Carbon\Carbon::parse($oven_horno->end_time)->format('H:i') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('end_time') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="scheduled_hours" class="block text-sm font-medium text-gray-700 mb-2">Horas Programadas (Opcional)</label>
                            <input type="number" step="0.01" id="scheduled_hours" name="scheduled_hours" value="{{ old('scheduled_hours', $oven_horno->scheduled_hours) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('scheduled_hours') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="average_temperature" class="block text-sm font-medium text-gray-700 mb-2">Temp Promedio (Opcional)</label>
                            <input type="number" step="0.01" id="average_temperature" name="average_temperature" value="{{ old('average_temperature', $oven_horno->average_temperature) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('average_temperature') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="observations" class="block text-sm font-medium text-gray-700 mb-2">Observaciones (Opcional)</label>
                        <textarea id="observations" name="observations" rows="4" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">{{ old('observations', $oven_horno->observations) }}</textarea>
                        @error('observations') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('oven_hornos.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
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
                text: "Se actualizará la información del horno.",
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
