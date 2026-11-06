<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Registrar Evento de Pilón') }}
            </h2>
            <a href="{{ route('events.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition-colors font-medium">
                &larr; Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <form action="{{ route('events.store') }}" method="POST" novalidate>
                    @csrf
                    
                    <div class="mb-6">
                        <label for="pilon_id" class="block text-sm font-medium text-gray-700 mb-2">Pilón</label>
                        <select id="pilon_id" name="pilon_id" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                            <option value="">-- Seleccione un Pilón --</option>
                            @foreach($pilons as $pilon)
                                <option value="{{ $pilon->id }}" {{ old('pilon_id') == $pilon->id ? 'selected' : '' }}>
                                    {{ $pilon->number ?? ('Pilón #' . $pilon->id) }}
                                </option>
                            @endforeach
                        </select>
                        @error('pilon_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento</label>
                        <input type="text" id="type" name="type" value="{{ old('type') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Ej. Volteo, Fumigación, Revisión...">
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Fecha del Evento</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors">
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="observations" class="block text-sm font-medium text-gray-700 mb-2">Observaciones (Opcional)</label>
                        <textarea id="observations" name="observations" rows="4" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-20 shadow-sm transition-colors" placeholder="Detalles adicionales del evento...">{{ old('observations') }}</textarea>
                        @error('observations')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                            Guardar Evento
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
