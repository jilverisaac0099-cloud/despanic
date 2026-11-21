<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Despanic S.A.') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-900 bg-[#F6EBCB]">
        <!-- Contenedor principal con estado de vista previa en pantalla completa -->
        <div
            x-data="sidebarPreview()"
            @keydown.escape.window="closePreview()"
            class="flex h-screen overflow-hidden"
        >

            <aside class="w-64 flex-shrink-0 flex flex-col h-full shadow-xl z-20" style="background-color: #EEDCA6;">
                
                <!-- Logo y Título (al pasar por aquí vuelve a tu vista actual) -->
                <div class="p-6 flex flex-col items-center mt-4" @mouseenter="closePreview()">
                    <img src="{{ asset('images/WhatsApp Image 2026-11-10 at 10.14.28 PM (1).jpeg') }}" 
                         alt="Logo Despanic" 
                         class="w-24 h-24 rounded-full border-2 mb-4 shadow-md object-cover" style="border-color: #C59B27;">
                    <h2 class="font-extrabold text-gray-900 text-sm tracking-widest uppercase">DESPANIC S.A.</h2>
                    <p class="text-[10px] text-gray-600 font-bold mt-1">Trazabilidad Tabacalera</p>
                    <div class="w-full border-b border-[#C59B27]/40 mt-6"></div>
                </div>

                <!-- Menú de Navegación -->
                <nav class="flex-1 px-4 py-2 space-y-3 overflow-y-auto">
                    <a href="{{ route('dashboard') }}" 
                       @mouseenter="startPreview('{{ route('dashboard') }}', 'Panel Principal')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('dashboard') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Panel Principal
                    </a>

                    <a href="{{ route('receptions.menu') }}" 
                       @mouseenter="startPreview('{{ route('receptions.menu') }}', '1. Recepción')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('receptions.menu') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('receptions.*') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            1. Recepción
                        </span>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="{{ route('pilons.menu') }}" 
                       @mouseenter="startPreview('{{ route('pilons.menu') }}', '2. Pilones')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('pilons.menu') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('pilons.*') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            2. Pilones
                        </span>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="{{ route('destemmings.menu') }}" 
                       @mouseenter="startPreview('{{ route('destemmings.menu') }}', '3. Despalillo')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('destemmings.menu') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('destemmings.*') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            3. Despalillo
                        </span>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="{{ route('dryings.menu') }}" 
                       @mouseenter="startPreview('{{ route('dryings.menu') }}', '4. Secadero')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('dryings.menu') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('dryings.*') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            4. Secadero
                        </span>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="{{ route('bales.menu') }}" 
                       @mouseenter="startPreview('{{ route('bales.menu') }}', '5. Pacas')"
                       @mouseleave="cancelIntent()"
                       :class="previewActive && previewUrl === '{{ route('bales.menu') }}' ? 'bg-[#2D5743]/20 text-[#2D5743] ring-1 ring-[#2D5743]/40' : ''"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('bales.*') ? 'bg-[#2D5743] text-white shadow-md' : 'text-gray-800 hover:bg-[#2D5743]/10 hover:text-[#2D5743]' }}">
                        <span class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                            5. Pacas
                        </span>
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </nav>

                <!-- Widgets y Cerrar Sesión -->
                <div class="p-4 mx-4 mt-2 mb-4 rounded-xl text-white shadow-md" style="background-color: #2D5743;" @mouseenter="closePreview()">
                    <p class="text-[11px] font-extrabold mb-1 tracking-wide">Control Total</p>
                    <p class="text-[9px] text-gray-200 leading-tight">Sistema operativo de fábrica en línea.</p>
                </div>

             <div class="px-4 pb-6" @mouseenter="closePreview()">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-[#2D5743] bg-[#F6EBCB] hover:bg-[#2D5743] hover:text-white rounded-xl border shadow-sm transition-all duration-200"
                style="border-color: #C59B27;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Cerrar Sesión
        </button>
    </form>
</div>
            </aside>

            <!-- ========================================================= -->
            <!-- CONTENIDO DE LA DERECHA (Pantalla normal + Vista Previa)  -->
            <!-- ========================================================= -->
            <main id="main-scroll-area" class="flex-1 overflow-y-auto w-full relative">
                
                <!-- Pantalla actual real -->
                <div id="page-slot" class="p-8" x-show="!previewActive">
                    {{ $slot }}
                </div>

                <!-- Vista previa completa al deslizar sobre otra área -->
                <div x-show="previewActive" x-cloak class="min-h-full">
                    
                    <!-- Barra superior fija para saber qué estás previsualizando -->
                    <div class="sticky top-0 z-20 px-8 py-3 flex items-center justify-between border-b shadow-sm backdrop-blur-md" style="background-color: rgba(238, 220, 166, 0.95); border-color: #C59B27;">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#2D5743] animate-pulse"></span>
                            <span class="text-xs font-extrabold uppercase tracking-wider text-[#2D5743]">
                                 <span x-text="previewTitle"></span>
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <a :href="previewUrl" class="px-3 py-1.5 rounded-lg text-xs font-bold text-white transition hover:opacity-90" style="background-color: #2D5743;">
                                Abrir esta área →
                            </a>
                            <button type="button" @click="closePreview()" class="px-3 py-1.5 rounded-lg text-xs font-bold text-gray-800 bg-white/70 hover:bg-white border transition" style="border-color: #C59B27;">
                                ✕ Volver
                            </button>
                        </div>
                    </div>

                    <!-- Spinner rápido (solo la primera vez que carga cada área) -->
                    <div x-show="loading" class="p-16 flex flex-col items-center justify-center gap-3 text-[#2D5743]">
                        <svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span class="text-sm font-bold">Cargando vista previa...</span>
                    </div>

                    <!-- Aquí se pinta el menú completo real del área -->
                    <div x-show="!loading" class="p-8" x-html="previewHtml"></div>

                </div>
            </main>

        </div>

        <script>
            window.sidebarPreview = function () {
                return {
                    previewActive: false,
                    previewTitle: '',
                    previewUrl: '',
                    previewHtml: '',
                    loading: false,
                    cache: {},
                    intentTimer: null,
                    requestedUrl: null,

                    normalizePath(url) {
                        try {
                            return new URL(url, window.location.origin).pathname.replace(/\/+$/, '') || '/';
                        } catch (e) {
                            return url;
                        }
                    },

                    isCurrentPage(url) {
                        return this.normalizePath(url) === this.normalizePath(window.location.href);
                    },

                    startPreview(url, title) {
                        clearTimeout(this.intentTimer);

                        
                        if (this.isCurrentPage(url)) {
                            this.closePreview();
                            return;
                        }

                        // Pequeña pausa inicial (120ms) para evitar parpadeos; al cambiar entre áreas es instantáneo
                        const delay = this.previewActive ? 0 : 120;

                        this.intentTimer = setTimeout(() => {
                            this.loadPreview(url, title);
                        }, delay);
                    },

                    cancelIntent() {
                        clearTimeout(this.intentTimer);
                    },

                    async loadPreview(url, title) {
                        this.requestedUrl = url;
                        this.previewTitle = title;
                        this.previewUrl = url;
                        this.previewActive = true;

                        if (this.cache[url]) {
                            this.previewHtml = this.cache[url];
                            this.loading = false;
                            this.scrollMainToTop();
                            return;
                        }

                        this.loading = true;

                        try {
                            const response = await fetch(url, {
                                credentials: 'same-origin',
                                headers: { 'X-Requested-With': 'XMLHttpRequest' }
                            });

                            if (!response.ok) throw new Error('Error al cargar');

                            const html = await response.text();
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const slot = doc.querySelector('#page-slot');

                            const content = slot
                                ? slot.innerHTML
                                : '<div class="p-6 text-sm text-gray-600">No se pudo cargar la vista previa.</div>';

                            this.cache[url] = content;

                            if (this.requestedUrl === url) {
                                this.previewHtml = content;
                                this.loading = false;
                                this.scrollMainToTop();
                            }
                        } catch (error) {
                            if (this.requestedUrl === url) {
                                this.previewHtml = '<div class="p-6 rounded-2xl border text-sm text-gray-700" style="background-color: #F6EBCB; border-color: #C59B27;">No se pudo cargar la vista previa. Haz clic en el área para abrirla directamente.</div>';
                                this.loading = false;
                            }
                        }
                    },

                    scrollMainToTop() {
                        const mainEl = document.getElementById('main-scroll-area');
                        if (mainEl) mainEl.scrollTop = 0;
                    },

                    closePreview() {
                        clearTimeout(this.intentTimer);
                        this.requestedUrl = null;
                        this.previewActive = false;
                        this.loading = false;
                    }
                };
            };
        </script>
    </body>
</html>
