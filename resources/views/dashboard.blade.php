<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESPANIC S.A - Sistema de Gestión de la Cadena Productiva</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
        details[open] > summary .circle-hub {
            border-color: #10b981;
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.25);
            transform: translateY(-4px);
        }
        details[open] > summary .chevron-icon {
            transform: rotate(180deg);
            color: #10b981;
        }
    </style>
</head>
<body class="bg-[#0a0f18] text-slate-200 font-sans antialiased min-h-screen flex flex-col">

    <!-- ENCABEZADO SUPERIOR CENTRADO -->
    <header class="bg-[#0f172a] border-b border-slate-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="relative flex flex-col items-center justify-center text-center">
                
                <!-- Logo provisorio (Hoja de Tabaco) -->
                <div class="w-16 h-16 rounded-full bg-emerald-950/80 border border-emerald-600/50 flex items-center justify-center mb-3 shadow-inner">
                    <svg class="w-8 h-8 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                    </svg>
                </div>

                <!-- Nombre Principal -->
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-widest text-white uppercase">
                    DESPANIC S.A
                </h1>

                <!-- Subtítulo -->
                <p class="mt-2 text-xs sm:text-sm font-semibold tracking-[0.2em] text-emerald-400 uppercase">
                    Sistema de Gestión de la Cadena Productiva
                </p>

                <!-- Acceso Directo a Pilones -->
                <div class="mt-5 lg:mt-0 lg:absolute lg:right-0 lg:top-1/2 lg:-translate-y-1/2">
                    <a href="{{ route('pilons.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-700 hover:bg-emerald-600 text-white text-xs font-bold uppercase tracking-wider rounded-lg border border-emerald-500/40 shadow-md transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        Ver Lista de Pilones
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- CONTENIDO CENTRAL: LAS 5 ÁREAS EN CÍRCULOS -->
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl w-full mx-auto">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 items-start">

                <!-- =============================================================== -->
                <!-- 1. RECEPCIÓN DE MATERIA PRIMA                                   -->
                <!-- =============================================================== -->
                <details class="group flex flex-col items-center">
                    <summary class="cursor-pointer flex flex-col items-center text-center select-none">
                        <div class="circle-hub w-40 h-40 rounded-full bg-[#0f172a] border-2 border-slate-700 hover:border-emerald-500 flex flex-col items-center justify-center p-4 transition-all duration-200 shadow-xl">
                            <span class="text-[11px] font-mono font-bold text-emerald-400 mb-1">FASE 01</span>
                            <svg class="w-8 h-8 text-white mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <span class="text-[11px] font-bold tracking-wider text-white uppercase leading-tight">
                                RECEPCIÓN DE MATERIA PRIMA
                            </span>
                            <svg class="w-4 h-4 text-slate-400 mt-1.5 chevron-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </summary>

                    <!-- Tablas Reales de Recepción -->
                    <div class="w-full mt-4 bg-[#0f172a] border border-slate-800 rounded-xl p-2.5 space-y-1.5 shadow-lg">
                        <a href="{{ route('lots_receptions.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Recepción de Lotes
                        </a>
                        <a href="{{ route('lots_details.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Detalles de Lotes
                        </a>
                    </div>
                </details>

                <!-- =============================================================== -->
                <!-- 2. PILONES/FERMENTACIÓN                                         -->
                <!-- =============================================================== -->
                <details class="group flex flex-col items-center">
                    <summary class="cursor-pointer flex flex-col items-center text-center select-none">
                        <div class="circle-hub w-40 h-40 rounded-full bg-[#0f172a] border-2 border-slate-700 hover:border-emerald-500 flex flex-col items-center justify-center p-4 transition-all duration-200 shadow-xl">
                            <span class="text-[11px] font-mono font-bold text-emerald-400 mb-1">FASE 02</span>
                            <svg class="w-8 h-8 text-white mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <span class="text-[11px] font-bold tracking-wider text-white uppercase leading-tight">
                                PILONES / FERMENTACIÓN
                            </span>
                            <svg class="w-4 h-4 text-slate-400 mt-1.5 chevron-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </summary>

                    <!-- Tablas Reales de Pilones -->
                    <div class="w-full mt-4 bg-[#0f172a] border border-slate-800 rounded-xl p-2.5 space-y-1.5 shadow-lg">
                        <a href="{{ route('pilons.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Pilones
                        </a>
                        <a href="{{ route('pilon_origins.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Origen de Pilón
                        </a>
                        <a href="{{ route('events.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Eventos
                        </a>
                        <a href="{{ route('temperatures.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Temperatura
                        </a>
                    </div>
                </details>

                <!-- =============================================================== -->
                <!-- 3. DESPALILLO                                                   -->
                <!-- =============================================================== -->
                <details class="group flex flex-col items-center">
                    <summary class="cursor-pointer flex flex-col items-center text-center select-none">
                        <div class="circle-hub w-40 h-40 rounded-full bg-[#0f172a] border-2 border-slate-700 hover:border-emerald-500 flex flex-col items-center justify-center p-4 transition-all duration-200 shadow-xl">
                            <span class="text-[11px] font-mono font-bold text-emerald-400 mb-1">FASE 03</span>
                            <svg class="w-8 h-8 text-white mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/>
                            </svg>
                            <span class="text-[11px] font-bold tracking-wider text-white uppercase leading-tight">
                                DESPALILLO
                            </span>
                            <svg class="w-4 h-4 text-slate-400 mt-1.5 chevron-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </summary>

                    <!-- Tablas Reales de Despalillo -->
                    <div class="w-full mt-4 bg-[#0f172a] border border-slate-800 rounded-xl p-2.5 space-y-1.5 shadow-lg">
                        <a href="{{ route('destemming_preparations.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Preparación de Despalillo
                        </a>
                        <a href="{{ route('employees.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Empleados
                        </a>
                        <a href="{{ route('destemming_deliveries.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Entregas de Despalillo
                        </a>
                        <a href="{{ route('tobacco_classes.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Clases de Tabaco
                        </a>
                        <a href="{{ route('detailed_destemmings.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Detalles de Despalillo
                        </a>
                        <a href="{{ route('destemming_drawers.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Cajones de Despalillo
                        </a>
                        <a href="{{ route('vein_destemmings.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Vena de Despalillo
                        </a>
                        <a href="{{ route('destemming_closures.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Cierre de Despalillo
                        </a>
                    </div>
                </details>

                <!-- =============================================================== -->
                <!-- 4. SECADERO                                                     -->
                <!-- =============================================================== -->
                <details class="group flex flex-col items-center">
                    <summary class="cursor-pointer flex flex-col items-center text-center select-none">
                        <div class="circle-hub w-40 h-40 rounded-full bg-[#0f172a] border-2 border-slate-700 hover:border-emerald-500 flex flex-col items-center justify-center p-4 transition-all duration-200 shadow-xl">
                            <span class="text-[11px] font-mono font-bold text-emerald-400 mb-1">FASE 04</span>
                            <svg class="w-8 h-8 text-white mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <span class="text-[11px] font-bold tracking-wider text-white uppercase leading-tight">
                                SECADERO
                            </span>
                            <svg class="w-4 h-4 text-slate-400 mt-1.5 chevron-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </summary>

                    <!-- Tablas Reales de Secadero -->
                    <div class="w-full mt-4 bg-[#0f172a] border border-slate-800 rounded-xl p-2.5 space-y-1.5 shadow-lg">
                        <a href="{{ route('drying_receptions.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Recepción de Secado
                        </a>
                        <a href="{{ route('drawers_entrys.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Cajones de Secado
                        </a>
                        <a href="{{ route('oven_hornos.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Control de Hornos
                        </a>
                        <a href="{{ route('exit_dryings.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Salidas de Secadero
                        </a>
                        <a href="{{ route('drying_closures.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Cierre de Secadero
                        </a>
                    </div>
                </details>

                <!-- =============================================================== -->
                <!-- 5. PACAS                                                        -->
                <!-- =============================================================== -->
                <details class="group flex flex-col items-center">
                    <summary class="cursor-pointer flex flex-col items-center text-center select-none">
                        <div class="circle-hub w-40 h-40 rounded-full bg-[#0f172a] border-2 border-slate-700 hover:border-emerald-500 flex flex-col items-center justify-center p-4 transition-all duration-200 shadow-xl">
                            <span class="text-[11px] font-mono font-bold text-emerald-400 mb-1">FASE 05</span>
                            <svg class="w-8 h-8 text-white mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                            <span class="text-[11px] font-bold tracking-wider text-white uppercase leading-tight">
                                PACAS
                            </span>
                            <svg class="w-4 h-4 text-slate-400 mt-1.5 chevron-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </summary>

                    <!-- Tablas Reales de Pacas -->
                    <div class="w-full mt-4 bg-[#0f172a] border border-slate-800 rounded-xl p-2.5 space-y-1.5 shadow-lg">
                        <a href="{{ route('bale_dryings.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Secado Pacas
                        </a>
                        <a href="{{ route('bale_compositions.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Composición de Paca
                        </a>
                        <a href="{{ route('bale_packagings.index') }}" class="block px-3.5 py-2.5 bg-slate-900/80 hover:bg-slate-800 text-xs font-medium text-slate-200 hover:text-emerald-400 rounded-lg transition-colors">
                            Empaque de Pacas
                        </a>
                    </div>
                </details>

            </div>

        </div>
    </main>

</body>
</html>
