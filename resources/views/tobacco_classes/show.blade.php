<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Detalle de Clase de Tabaco') }}
            </h2>
            <a href="{{ route('tobacco_classes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a la lista
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 p-8">
                
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Código</h3>
                    <p class="text-lg font-semibold text-gray-900">{{ $tobaccoClass->code }}</p>
                </div>

                <div class="mt-8 border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Nombre</h3>
                    <div class="text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        {{ $tobaccoClass->name }}
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Tipo</h3>
                    <div class="text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        {{ $tobaccoClass->type }}
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Estado de Calidad</h3>
                    <div class="text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        {{ $tobaccoClass->quality_status }}
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-100 pt-6">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Tamaño</h3>
                    <div class="text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        {{ $tobaccoClass->size }}
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                    <form action="{{ route('tobacco_classes.destroy', $tobaccoClass) }}" method="POST" class="inline" id="form-delete-{{ $tobaccoClass->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmarEliminacion({{ $tobaccoClass->id }})" class="inline-flex items-center px-4 py-2 bg-white border border-red-200 rounded-xl font-semibold text-xs text-red-600 uppercase tracking-widest shadow-sm hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Eliminar
                        </button>
                    </form>

                    <a href="{{ route('tobacco_classes.edit', $tobaccoClass) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                        Editar Clase
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Eliminar de forma permanente?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: '#1e293b',
                color: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl border border-gray-700'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-delete-' + id).submit();
                }
            })
        }
    </script>
</x-app-layout>
