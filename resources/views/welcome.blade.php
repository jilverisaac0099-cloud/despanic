@extends('layouts.app')

@section('content')
<div class="relative min-h-[85vh] flex items-center justify-center rounded-3xl overflow-hidden shadow-2xl my-4">
    <!-- Imagen real de plantación de tabaco con alta calidad y overlay degradado -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=1920&auto=format&fit=crop" alt="Plantación de Tabaco" class="w-full h-full object-cover transform scale-105 transition-transform duration-1000 hover:scale-100">
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-emerald-950/40 backdrop-blur-[2px]"></div>
    </div>

    <!-- Contenido Central con Animaciones -->
    <div class="relative z-10 px-8 py-16 sm:px-16 max-w-5xl mx-auto text-center lg:text-left flex flex-col lg:flex-row items-center justify-between gap-12 w-full">
        
        <div class="space-y-6 max-w-2xl">
            <!-- Badge Animado -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold tracking-wider text-emerald-300 bg-emerald-900/80 border border-emerald-500/40 uppercase shadow-lg backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                Excelencia y Tradición Tabacalera
            </div>

            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white drop-shadow-md">
                Tabacalera <span class="text-emerald-400 bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent">San Andrés</span>
            </h1>

            <p class="text-gray-200 text-lg sm:text-xl font-light leading-relaxed drop-shadow">
                Plataforma inteligente para la trazabilidad total: control absoluto desde los lotes en campo, hornos de secado y despalillo, hasta la fermentación perfecta en pilones.
            </p>

            <div class="flex flex-wrap gap-4 justify-center lg:justify-start pt-4">
                <a href="{{ route('lots_receptions.index') }}" class="group relative inline-flex items-center gap-3 px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-2xl shadow-xl shadow-emerald-900/50 transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 text-decoration-none">
                    <span>Iniciar Recepción de Lotes</span>
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="{{ route('pilons.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-bold rounded-2xl border border-white/20 backdrop-blur-md shadow-lg transition-all duration-300 transform hover:-translate-y-1 text-decoration-none">
                    Ver Pilones
                </a>
            </div>
        </div>

        <!-- Panel de Estadísticas Animado -->
        <div class="shrink-0 bg-gray-900/80 backdrop-blur-xl p-8 rounded-3xl border border-emerald-500/30 shadow-2xl flex flex-col gap-6 text-center w-full sm:w-80 transform transition-all duration-500 hover:scale-105">
            <div class="border-b border-gray-700/60 pb-4">
                <span class="block text-4xl font-black text-emerald-400 drop-shadow">22</span>
                <span class="text-xs font-semibold text-gray-300 uppercase tracking-widest">Módulos CRUD Activos</span>
            </div>
            <div class="border-b border-gray-700/60 pb-4">
                <span class="block text-4xl font-black text-teal-300 drop-shadow">100%</span>
                <span class="text-xs font-semibold text-gray-300 uppercase tracking-widest">Trazabilidad en Planta</span>
            </div>
            <div class="flex items-center justify-center gap-2 text-emerald-400 text-xs font-bold bg-emerald-950/60 py-2.5 px-4 rounded-xl border border-emerald-800/40">
                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                Sistema Sincronizado
            </div>
        </div>
    </div>
</div>

<!-- Tarjetas Interactivas de Módulos con Animación Hover -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-8">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 hover:border-emerald-500 transition-all duration-300 transform hover:-translate-y-2 group">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex items-center justify-center text-2xl mb-5 shadow-md group-hover:rotate-6 transition-transform">
            🌱
        </div>
        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-2">Recepción y Lotes</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Control riguroso de productores, orígenes, fechas y libras de tabaco crudo.</p>
        <a href="{{ route('lots_receptions.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 group-hover:translate-x-2 transition-transform text-decoration-none">
            Explorar módulo &rarr;
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 hover:border-amber-500 transition-all duration-300 transform hover:-translate-y-2 group">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 text-white flex items-center justify-center text-2xl mb-5 shadow-md group-hover:rotate-6 transition-transform">
            🔥
        </div>
        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-2">Secado y Hornos</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Monitoreo térmico, hornos, fardos de secado y cierres de procesos de curado.</p>
        <a href="{{ route('oven_hornos.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-amber-600 dark:text-amber-400 group-hover:translate-x-2 transition-transform text-decoration-none">
            Explorar módulo &rarr;
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 hover:border-teal-500 transition-all duration-300 transform hover:-translate-y-2 group">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-400 to-teal-600 text-white flex items-center justify-center text-2xl mb-5 shadow-md group-hover:rotate-6 transition-transform">
            🍃
        </div>
        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-2">Despalillo</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Gestión detallada de venas, gavetas, preparaciones y entregas de hojas.</p>
        <a href="{{ route('destemming_preparations.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-teal-600 dark:text-teal-400 group-hover:translate-x-2 transition-transform text-decoration-none">
            Explorar módulo &rarr;
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-2 group">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 text-white flex items-center justify-center text-2xl mb-5 shadow-md group-hover:rotate-6 transition-transform">
            🏛️
        </div>
        <h3 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-2">Pilones y Tabaco</h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Administración de pilones de fermentación, orígenes y clasificación.</p>
        <a href="{{ route('pilons.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 dark:text-indigo-400 group-hover:translate-x-2 transition-transform text-decoration-none">
            Explorar módulo &rarr;
        </a>
    </div>
</div>
@endsection