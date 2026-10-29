<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight tracking-tight">
                {{ __('Recepción de Lotes') }}
            </h2>
            <a href="{{ route('lots_reception.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/30">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Nueva Recepción
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900/50 border-b border-gray-100 dark:border-gray-700">
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Productor</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Origen</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fecha</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Libras Recibidas</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Observaciones</th>
                                <th class="py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($lotsReceptions as $lotReception)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors">
                                    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-400 font-medium">#{{ $lotReception->id }}</td>
                                    <td class="py-4 px-6 text-sm font-semibold text-gray-900 dark:text-white">{{ $lotReception->producer }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $lotReception->origin }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $lotReception->date }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ number_format($lotReception->pounds_received, 2) }} Lbs</td>
                                    <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($lotReception->remarks ?? 'Sin observaciones', 40) }}</td>
                                    <td class="py-4 px-6 text-sm text-right space-x-2">
                                        <a href="{{ route('lots_reception.show', $lotReception) }}" class="inline-flex items-center px-3 py-1.5 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                            Ver
                                        </a>
                                        <a href="{{ route('lots_reception.edit', $lotReception) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors">
                                            Editar
                                        </a>
                                        <form action="{{ route('lots_reception.destroy', $lotReception) }}" method="POST" class="inline" id="form-delete-{{ $lotReception->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmarEliminacion({{ $lotReception->id }})" class="inline-flex items-center px-3 py-1.5 bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg text-xs font-semibold uppercase tracking-wider hover:bg-red-100 dark:hover:bg-red-900/50 transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 px-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No hay recepciones de lotes registradas.
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
