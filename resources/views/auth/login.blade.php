<x-guest-layout>
    <!-- Contenedor de Pantalla Completa con el Fondo Crema (#EEDCA6) -->
    <div class="fixed inset-0 min-h-screen w-full flex flex-col items-center justify-center p-6 m-0" style="background-color: #EEDCA6; margin: 0 !important;">
        
        <!-- Tarjeta de Login Principal (Arena #F6EBCB con borde Dorado Suave #C59B27) -->
        <div class="w-full sm:max-w-md p-8 rounded-3xl shadow-2xl border relative z-10" style="background-color: #F6EBCB; border-color: #C59B27;">
            
            <!-- Logo Circular Real y Título de la Empresa -->
            <div class="flex flex-col items-center text-center mb-6 pb-6 border-b" style="border-color: #C59B27;">
                <img src="{{ asset('images/WhatsApp Image 2026-11-10 at 10.14.28 PM (1).jpeg') }}" 
                     alt="Despanic SA" 
                     class="w-24 h-24 rounded-full shadow-lg object-cover border-2 mb-3" style="border-color: #C59B27;">
                <h2 class="font-extrabold text-gray-900 text-base tracking-wider uppercase">DESPANIC S.A.</h2>
                <p class="text-xs text-gray-600 font-medium mt-0.5">Trazabilidad Tabacalera</p>
            </div>



            <!-- Estado de Sesión / Alertas de Error -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Campo de Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full px-4 py-3 rounded-xl border text-sm text-gray-900 focus:outline-none focus:ring-2 shadow-sm"
                           style="background-color: #FFFDF9; border-color: #C59B27;">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Campo de Password con ID para manipularlo -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-4 py-3 rounded-xl border text-sm text-gray-900 focus:outline-none focus:ring-2 shadow-sm"
                           style="background-color: #FFFDF9; border-color: #C59B27;">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-600" />
                </div>

                <!-- Opción de Mostrar Contraseña (Sustituyendo "Recordar sesión") -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label for="show_password" class="inline-flex items-center text-gray-700 cursor-pointer select-none">
                        <input id="show_password" type="checkbox" onclick="togglePasswordVisibility()"
                               class="rounded border-gray-300 text-[#3A5A40] shadow-sm focus:ring-[#3A5A40] cursor-pointer">
                        <span class="ml-2 font-medium">Mostrar contraseña</span>
                    </label>
                </div>


                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-3 px-4 text-white text-sm font-bold rounded-xl shadow-lg transition transform hover:scale-[1.01] active:scale-[0.99]"
                            style="background-color: #3A5A40;">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>


        <p class="text-[11px] text-gray-700 font-medium mt-6 relative z-10">
            DESPANIC S.A. &copy; 2026 — Sistema de Trazabilidad 
        </p>
    </div>

   
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</x-guest-layout>
