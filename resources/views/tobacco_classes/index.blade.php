<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                {{ __('Clases de Tabaco') }}
            </h2>
            <a href="{{ route('tobacco_classes.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nueva Clase
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Código</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Calidad</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tamaño</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($tobaccoClasses as $tobaccoClass)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-4 px-6 text-sm text-gray-600 font-medium">#{{ $tobaccoClass->id }}</td>
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-900">{{ $tobaccoClass->code }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $tobaccoClass->name }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $tobaccoClass->type }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $tobaccoClass->quality_status }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600">{{ $tobaccoClass->size }}</td>
                                    <td class="py-4 px-6 text-sm text-right space-x-2">
                                        <a href="{{ route('tobacco_classes.show', $tobaccoClass) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-gray-200 transition-colors">
                                            Ver
                                        </a>
                                        <a href="{{ route('tobacco_classes.edit', $tobaccoClass) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-indigo-100 transition-colors">
                                            Editar
                                        </a>
                                        <form action="{{ route('tobacco_classes.destroy', $tobaccoClass) }}" method="POST" class="inline" id="form-delete-{{ $tobaccoClass->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmarEliminacion({{ $tobaccoClass->id }})" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-red-100 transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 px-6 text-center text-sm text-gray-500">
                                        No hay clases de tabaco registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
