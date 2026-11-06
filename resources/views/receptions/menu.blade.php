<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Área de Recepción de Materia Prima - Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700">Módulos de Recepción</h3>
                    <p class="text-sm text-gray-500">Selecciona la tabla que deseas abrir y gestionar:</p>
                </div>

                <!-- Tarjetas para elegir entre Recepción de Lotes y Detalles de Lotes -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Opción 1: Recepción de Lotes -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-blue-800 text-xl mb-2">Recepción de Lotes</h4>
                        <p class="text-sm text-gray-600 mb-4">Administra los registros principales de lotes recibidos, proveedores y libras.</p>
                        <a href="{{ route('lots_receptions.index') }}" class="inline-block bg-blue-600 text-white px-5 py-2.5 rounded text-sm font-semibold hover:bg-blue-700">Abrir Recepción de Lotes</a>
                    </div>

                    <!-- Opción 2: Detalles de Lotes -->
                    <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-indigo-800 text-xl mb-2">Detalles de Lotes</h4>
                        <p class="text-sm text-gray-600 mb-4">Gestiona la información detallada, especificaciones y características de los lotes.</p>
                        <a href="{{ route('lots_details.index') }}" class="inline-block bg-indigo-600 text-white px-5 py-2.5 rounded text-sm font-semibold hover:bg-indigo-700">Abrir Detalles de Lotes</a>
                    </div>

                </div>

                <div class="mt-8">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">&larr; Volver al Panel Principal</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
