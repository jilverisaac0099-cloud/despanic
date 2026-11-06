<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Principal - DESPANIC S.A.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-500">Selecciona el módulo o área productiva a la que deseas acceder:</p>
                </div>

                <!-- Cuadrícula de accesos por áreas filtradas por roles -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- ÁREA 1: RECEPCIÓN -->
                    @role('Administrador General|Encargado Recepcion')
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-blue-800 text-lg mb-2">Recepción de Materia Prima</h4>
                        <p class="text-sm text-gray-600 mb-4">Gestión de lotes y detalles de recepción.</p>
                        <a href="{{ route('receptions.menu') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-blue-700">Entrar al Área</a>
                    </div>
                    @endrole

                    <!-- ÁREA 2: PILONES -->
                    @role('Administrador General|Encargado Pilones')
                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-amber-800 text-lg mb-2">Pilones / Fermentación</h4>
                        <p class="text-sm text-gray-600 mb-4">Control de pilones, orígenes, eventos y temperaturas.</p>
                        <a href="{{ route('pilons.index') }}" class="inline-block bg-amber-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-amber-700">Entrar al Área</a>
                    </div>
                    @endrole

                    <!-- ÁREA 3: DESPALILLO -->
                    @role('Administrador General|Encargado Despalillo')
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-green-800 text-lg mb-2">Despalillo</h4>
                        <p class="text-sm text-gray-600 mb-4">Preparaciones, empleados, clases de tabaco y cierres.</p>
                        <a href="{{ route('destemming_preparations.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-green-700">Entrar al Área</a>
                    </div>
                    @endrole

                    <!-- ÁREA 4: SECADERO -->
                    @role('Administrador General|Encargado Secadero')
                    <div class="bg-orange-50 border border-orange-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-orange-800 text-lg mb-2">Secadero</h4>
                        <p class="text-sm text-gray-600 mb-4">Recepción de secadero, entradas a gavetas, hornos y salidas.</p>
                        <a href="{{ route('drying_receptions.index') }}" class="inline-block bg-orange-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-orange-700">Entrar al Área</a>
                    </div>
                    @endrole

                    <!-- ÁREA 5: PACAS -->
                    @role('Administrador General|Encargado Pacas')
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                        <h4 class="font-bold text-purple-800 text-lg mb-2">Pacas</h4>
                        <p class="text-sm text-gray-600 mb-4">Secado de pacas, composición y empaquetado final.</p>
                        <a href="{{ route('bale_dryings.index') }}" class="inline-block bg-purple-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-purple-700">Entrar al Área</a>
                    </div>
                    @endrole

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
