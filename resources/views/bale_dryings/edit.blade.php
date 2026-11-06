<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Editar Secado de Paca') }}
            </h2>
            <a href="{{ route('bale_dryings.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('bale_dryings.update', $bale_drying->id) }}" method="POST" id="form-edit-{{ $bale_drying->id }}" onsubmit="confirmarActualizacion(event, {{ $bale_drying->id }})" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="bale_code" class="block text-sm font-medium text-gray-700 mb-2">Código de Paca</label>
                        <input type="text" id="bale_code" name="bale_code" value="{{ old('bale_code', $bale_drying->bale_code) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors font-mono">
                        @error('bale_code')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tobacco_classes_id" class="block text-sm font-medium text-gray-700 mb-2">Clase de Tabaco</label>
                        <select id="tobacco_classes_id" name="tobacco_classes_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione Clase --</option>
                            @foreach($tobacco_classes as $class)
                                <option value="{{ $class->id }}" {{ old('tobacco_classes_id', $bale_drying->tobacco_classes_id) == $class->id ? 'selected' : '' }}>
                                    {{ $class->name ?? $class->class_name ?? ('Clase #' . $class->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('tobacco_classes_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="net_weight" class="block text-sm font-medium text-gray-700 mb-2">Peso Neto (Lbs)</label>
                            <input type="number" step="0.01" id="net_weight" name="net_weight" value="{{ old('net_weight', $bale_drying->net_weight) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('net_weight')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="packaging_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Empacado</label>
                            <input type="date" id="packaging_date" name="packaging_date" value="{{ old('packaging_date', $bale_drying->packaging_date ? \Carbon\Carbon::parse($bale_drying->packaging_date)->format('Y-m-d') : '') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            @error('packaging_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('bale_dryings.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Actualizar Paca
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
                text: "Se actualizará la información del secado de la paca.",
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
