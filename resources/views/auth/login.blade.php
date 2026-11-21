<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despanic S.A. — Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        body, html {
            min-height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        /* FONDO CON CAPA OSCURA PARA LEGIBILIDAD */
        .background {
            position: fixed;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.55)),
                        url("{{ asset('images/fondo-tabaco.jpg') }}") no-repeat center center;
            background-size: cover;
            z-index: -1;
        }

        /* CONTENEDOR SIN FONDO (TRANSPARENTE) */
        .login-container {
            width: 100%;
            max-width: 440px;
            padding: 36px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #ffffff;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.65);
            animation: fadeIn 0.6s ease-out;
        }

        /* LOGO */
        .logo-container {
            width: 120px;
            height: 120px;
            margin-bottom: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.45);
        }

        /* ENCABEZADOS */
        h1 {
            font-size: 25px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 4px;
            text-align: center;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #f3ead3;
            margin-bottom: 34px;
            text-align: center;
        }

        /* ALERTAS DE LARAVEL */
        .alert-error {
            width: 100%;
            background: rgba(153, 27, 27, 0.88);
            border: 1px solid rgba(254, 202, 202, 0.5);
            color: #ffffff;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 18px;
            text-shadow: none;
        }

        .alert-error ul {
            margin-left: 16px;
        }

        .alert-status {
            width: 100%;
            background: rgba(46, 77, 54, 0.9);
            border: 1px solid rgba(187, 247, 208, 0.5);
            color: #ffffff;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 18px;
            text-shadow: none;
        }

        /* FORMULARIO */
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #ffffff;
            margin-left: 2px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            height: 50px;
            padding: 0 18px;
            font-size: 15px;
            background-color: #fcf9ee;
            border: 1.5px solid #d4c59e;
            border-radius: 14px;
            color: #1f2e22;
            outline: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.25s ease;
        }

        input:focus {
            background-color: #ffffff;
            border-color: #3a5a40;
            box-shadow: 0 0 0 3px rgba(252, 249, 238, 0.35), 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        /* OPCIONES EXTRAS */
        .extra-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12.5px;
            gap: 10px;
            margin-top: -2px;
        }

        .show-pass-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
            font-size: 13px;
            font-weight: 500;
            text-transform: none;
            letter-spacing: 0;
            color: #ffffff;
        }

        .show-pass-label input {
            cursor: pointer;
            accent-color: #2e4d36;
            width: 16px;
            height: 16px;
        }

        .forgot-password {
            color: #ffffff;
            text-decoration: none;
            font-size: 12.5px;
            padding: 6px 12px;
            border: 1px solid rgba(255, 255, 255, 0.75);
            border-radius: 8px;
            background: rgba(0, 0, 0, 0.25);
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .forgot-password:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: #ffffff;
        }

        /* BOTÓN INICIAR SESIÓN */
        .btn-login {
            margin-top: 10px;
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 26px;
            background-color: #2e4d36;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            background-color: #243d2a;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        /* PIE DE PÁGINA */
        .footer {
            margin-top: 48px;
            font-size: 12px;
            letter-spacing: 0.4px;
            text-align: center;
            color: rgba(255, 255, 255, 0.88);
            width: 100%;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .login-container { padding: 24px 18px; }
            h1 { font-size: 22px; }
            .subtitle { margin-bottom: 28px; }
            .footer { margin-top: 36px; }
        }
    </style>
</head>
<body>

    <div class="background"></div>

    <div class="login-container">
        <div class="logo-container">
            <img class="logo" src="{{ asset('images/WhatsApp Image 2026-11-10 at 10.14.28 PM (1).jpeg') }}" alt="Logo DESPANIC S.A.">
        </div>

        <h1>Despanic S.A.</h1>
        <div class="subtitle">Trazabilidad Tabacalera</div>

        @if (session('status'))
            <div class="alert-status">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>

            <div class="extra-options">
                <label class="show-pass-label">
                    <input type="checkbox" id="showPassword"> Mostrar contraseña
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <div class="footer">
            DESPANIC S.A. © {{ date('Y') }} — Sistema de Trazabilidad
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>

</body>
</html>
