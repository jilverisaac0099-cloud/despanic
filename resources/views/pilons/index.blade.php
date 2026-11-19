<x-app-layout>
    <div x-data="{ search: '', filterStatus: 'all' }" class="space-y-6 text-gray-900">

        <!-- Encabezado principal -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-black tracking-tight">
                Control de Pilones y Fermentación
            </h1>

            <a href="{{ route('pilons.create') }}"
               class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-[#2D5743] hover:bg-[#234434] shadow-sm transition-colors">
                <span>+ Armar Nuevo Pilón</span>
            </a>
        </div>

        <!-- Barra de búsqueda y filtro -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3">
            <div class="relative w-full sm:w-72">
                <input type="text"
                       x-model="search"
                       placeholder="Buscar pilón..."
                       class="w-full px-4 py-2 rounded-xl bg-[#FDF9EE] text-black placeholder-gray-600 border border-[#C59B27]/60 text-sm focus:outline-none focus:border-[#2D5743]">
            </div>

            <div class="relative" x-data="{ open: false }">
                <button type="button"
                        @click="open = !open"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-[#FDF9EE] text-black border border-[#C59B27]/60 text-sm font-semibold hover:bg-[#EEDCA6]/50 transition-colors">
                    <span>Filtro</span>
                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open"
                     @click.outside="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-44 rounded-xl bg-[#FDF9EE] border border-[#C59B27]/60 shadow-lg py-1 z-30 text-sm text-black">
                    <button type="button" @click="filterStatus = 'all'; open = false" class="w-full text-left px-4 py-2 hover:bg-[#EEDCA6]/60">
                        Todos
                    </button>
                    <button type="button" @click="filterStatus = 'en_proceso'; open = false" class="w-full text-left px-4 py-2 hover:bg-[#EEDCA6]/60">
                        En Proceso
                    </button>
                    <button type="button" @click="filterStatus = 'finalizado'; open = false" class="w-full text-left px-4 py-2 hover:bg-[#EEDCA6]/60">
                        Finalizado
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabla -->
        <div class="bg-[#FDF9EE] rounded-2xl border border-[#C59B27]/50 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#2D5743] text-white text-xs uppercase tracking-wider">
                            <th class="py-3.5 px-5 font-bold">#</th>
                            <th class="py-3.5 px-5 font-bold">Número</th>
                            <th class="py-3.5 px-5 font-bold">Peso (Lbs)</th>
                            <th class="py-3.5 px-5 font-bold">Fecha de Armado</th>
                            <th class="py-3.5 px-5 font-bold">Estado</th>
                            <th class="py-3.5 px-5 font-bold text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#C59B27]/30 bg-[#FDF9EE] text-sm text-black">
                        @forelse ($pilons as $index => $pilon)
                            @php
                                $rawNumero = $pilon->numero
                                    ?? $pilon->number
                                    ?? $pilon->codigo
                                    ?? $pilon->pilon_numero
                                    ?? $pilon->id
                                    ?? ($index + 1);

                                $numeroFormateado = is_numeric($rawNumero)
                                    ? str_pad((int) $rawNumero, 2, '0', STR_PAD_LEFT)
                                    : $rawNumero;

                                $rawPeso = $pilon->peso
                                    ?? $pilon->peso_lbs
                                    ?? $pilon->weight
                                    ?? 0;

                                $rawFecha = $pilon->fecha_armado
                                    ?? $pilon->fecha
                                    ?? $pilon->created_at
                                    ?? now();

                                $rawEstado = strtolower(trim((string) (
                                    $pilon->estado
                                    ?? $pilon->status
                                    ?? $pilon->state
                                    ?? 'en proceso'
                                )));

                                $esFinalizado = in_array($rawEstado, ['finalizado', 'finalizada', 'completado', 'completada', 'cerrado', 'cerrada', 'terminado', 'finished', 'completed']);
                                $statusKey = $esFinalizado ? 'finalizado' : 'en_proceso';
                                $estadoTexto = $esFinalizado ? 'Finalizado' : 'En Proceso';
                            @endphp
                            <tr x-show="(filterStatus === 'all' || filterStatus === '{{ $statusKey }}') &&
                                        (search === '' || '{{ strtolower((string) $numeroFormateado) }}'.includes(search.toLowerCase()) || '{{ strtolower($estadoTexto) }}'.includes(search.toLowerCase()))"
                                class="hover:bg-[#EEDCA6]/40 transition-colors">
                                <td class="py-4 px-5 font-medium text-black">
                                    {{ str_pad(method_exists($pilons, 'firstItem') && $pilons->firstItem() ? $pilons->firstItem() + $index : $index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="py-4 px-5 font-semibold text-black">
                                    {{ $numeroFormateado }}
                                </td>
                                <td class="py-4 px-5 text-black">
                                    {{ number_format((float) $rawPeso, 2) }} Lbs
                                </td>
                                <td class="py-4 px-5 text-black">
                                    {{ \Carbon\Carbon::parse($rawFecha)->translatedFormat('d M Y') }}
                                </td>
                                <td class="py-4 px-5">
                                    @if ($esFinalizado)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#EEDCA6] text-black">
                                            Finalizado
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#DCE8DF] text-black">
                                            En Proceso
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-5">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Ver -->
                                        <a href="{{ route('pilons.show', $pilon) }}"
                                           title="Ver detalles"
                                           class="p-2 rounded-lg text-black hover:bg-[#EEDCA6] transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <!-- Editar -->
                                        <a href="{{ route('pilons.edit', $pilon) }}"
                                           title="Editar pilón"
                                           class="p-2 rounded-lg text-black hover:bg-[#EEDCA6] transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>

                                        <!-- Eliminar -->
                                        <form id="delete-pilon-{{ $pilon->id }}"
                                              action="{{ route('pilons.destroy', $pilon) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    title="Eliminar pilón"
                                                    onclick="confirmDeletePilon({{ $pilon->id }}, '{{ $numeroFormateado }}')"
                                                    class="p-2 rounded-lg text-black hover:bg-[#EEDCA6] transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 px-5 text-center text-sm text-black">
                                    No hay pilones registrados todavía.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pie de tabla: Contador + Paginación numérica siempre visible -->
        @php
            $isPaginated = method_exists($pilons, 'total');
            $totalPilons = $isPaginated ? $pilons->total() : $pilons->count();
            $firstNum = $isPaginated ? ($pilons->firstItem() ?? 0) : ($totalPilons > 0 ? 1 : 0);
            $lastNum = $isPaginated ? ($pilons->lastItem() ?? 0) : $totalPilons;
            $currentPage = $isPaginated ? $pilons->currentPage() : 1;
            $lastPage = $isPaginated ? max(1, $pilons->lastPage()) : 1;
        @endphp

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-1 text-sm text-black">
            <div>
                @if ($totalPilons > 0)
                    Mostrando {{ $firstNum }}–{{ $lastNum }} de {{ $totalPilons }} pilones activos
                @else
                    Mostrando 0 pilones activos
                @endif
            </div>

            <div class="inline-flex items-center gap-1.5">
                @if ($isPaginated && !$pilons->onFirstPage())
                    <a href="{{ $pilons->previousPageUrl() }}"
                       class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-[#C59B27]/60 bg-[#FDF9EE] text-black hover:bg-[#EEDCA6] transition-colors">
                        &lt;
                    </a>
                @else
                    <span class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-[#C59B27]/50 bg-[#FDF9EE] text-black opacity-40 cursor-not-allowed">
                        &lt;
                    </span>
                @endif

                @if ($isPaginated)
                    @foreach ($pilons->getUrlRange(1, $lastPage) as $page => $url)
                        @if ($page == $currentPage)
                            <span class="w-8 h-8 inline-flex items-center justify-center rounded-lg bg-[#2D5743] text-white font-bold">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-[#C59B27]/60 bg-[#FDF9EE] text-black hover:bg-[#EEDCA6] transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @else
                    <span class="w-8 h-8 inline-flex items-center justify-center rounded-lg bg-[#2D5743] text-white font-bold">
                        1
                    </span>
                @endif

                @if ($isPaginated && $pilons->hasMorePages())
                    <a href="{{ $pilons->nextPageUrl() }}"
                       class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-[#C59B27]/60 bg-[#FDF9EE] text-black hover:bg-[#EEDCA6] transition-colors">
                        &gt;
                    </a>
                @else
                    <span class="w-8 h-8 inline-flex items-center justify-center rounded-lg border border-[#C59B27]/50 bg-[#FDF9EE] text-black opacity-40 cursor-not-allowed">
                        &gt;
                    </span>
                @endif
            </div>
        </div>

    </div>

    <script>
        function confirmDeletePilon(id, numero) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: '¿Eliminar Pilón #' + numero + '?',
                    text: 'Esta acción eliminará el registro seleccionado.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2D5743',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-pilon-' + id).submit();
                    }
                });
            } else if (confirm('¿Eliminar Pilón #' + numero + '?')) {
                document.getElementById('delete-pilon-' + id).submit();
            }
        }
    </script>
</x-app-layout>
