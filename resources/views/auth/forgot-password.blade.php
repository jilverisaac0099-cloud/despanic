<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despanic S.A. — Recuperación de Clave</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

        /* MISMO FONDO DEL LOGIN */
        .background {
            position: fixed;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.55)),
                        url("{{ asset('images/fondo-tabaco.jpg') }}") no-repeat center center;
            background-size: cover;
            z-index: -1;
        }

        /* CONTENEDOR GENERAL */
        .recovery-container {
            width: 100%;
            max-width: 460px;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 0.6s ease-out;
        }

        /* LOGO Y ENCABEZADO DE MARCA */
        .logo-container {
            width: 96px;
            height: 96px;
            margin-bottom: 12px;
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

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #ffffff;
            text-transform: uppercase;
            text-align: center;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.65);
            margin-bottom: 2px;
        }

        .brand-subtitle {
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #f3ead3;
            text-align: center;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.65);
            margin-bottom: 22px;
        }

        /* TARJETA EN TONO CREMA (A JUEGO CON LOS INPUTS DEL LOGIN) */
        .info-card {
            width: 100%;
            background-color: rgba(252, 249, 238, 0.96);
            border: 1.5px solid #d4c59e;
            border-radius: 20px;
            padding: 26px 24px;
            text-align: center;
            color: #1f2e22;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        /* ÍCONO DE USUARIO BLOQUEADO */
        .icon-badge {
            width: 70px;
            height: 70px;
            margin: 0 auto 16px;
            border-radius: 50%;
            border: 2px solid #2e4d36;
            background-color: rgba(46, 77, 54, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2e4d36;
        }

        .icon-badge svg {
            width: 34px;
            height: 34px;
        }

        .card-title {
            font-size: 17px;
            font-weight: 800;
            color: #162419;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .card-message {
            font-size: 13.5px;
            font-weight: 500;
            line-height: 1.55;
            color: #2c3e30;
            margin-bottom: 20px;
        }

        /* CAJA DE CONTACTO */
        .contact-box {
            background-color: #f3ebd3;
            border: 1px solid #d4c59e;
            border-radius: 14px;
            padding: 14px 16px;
        }

        .contact-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #2e4d36;
            margin-bottom: 10px;
        }

        .contact-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            font-weight: 700;
            color: #1f2e22;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-item:hover {
            color: #2e4d36;
        }

        .contact-item svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .icon-mail {
            color: #2e4d36;
        }

        .icon-phone {
            color: #b91c1c;
        }

        /* BOTÓN VOLVER (MISMO ESTILO QUE EL BOTÓN DE LOGIN) */
        .btn-back {
            margin-top: 20px;
            width: 100%;
            height: 50px;
            border-radius: 26px;
            background-color: #2e4d36;
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
            transition: all 0.25s ease;
        }

        .btn-back:hover {
            background-color: #243d2a;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
        }

        .btn-back:active {
            transform: translateY(1px);
        }

        .btn-back svg {
            width: 18px;
            height: 18px;
        }

        /* PIE DE PÁGINA */
        .footer {
            margin-top: 28px;
            font-size: 12px;
            letter-spacing: 0.4px;
            text-align: center;
            color: rgba(255, 255, 255, 0.88);
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.65);
            width: 100%;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .recovery-container { padding: 20px 16px; }
            .info-card { padding: 22px 18px; }
            .brand-title { font-size: 20px; }
        }
    </style>
</head>
<body>

    <div class="background"></div>

    <div class="recovery-container">
        <div class="logo-container">
            <img class="logo" src="{{ asset('images/WhatsApp Image 2026-11-10 at 10.14.28 PM (1).jpeg') }}" alt="Logo DESPANIC S.A.">
        </div>

        <div class="brand-title">Despanic S.A.</div>
        <div class="brand-subtitle">Trazabilidad Tabacalera</div>

        <div class="info-card">
            <div class="icon-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M10.3 15H7a4 4 0 0 0-4 4v2"/>
                    <rect width="8" height="5" x="13" y="16" rx=".899"/>
                    <path d="M15 15v-2a2 2 0 1 1 4 0v2"/>
                </svg>
            </div>

            <h2 class="card-title">Acceso Bloqueado / Recuperación de Clave</h2>

            <p class="card-message">
                ⚠️ No es posible restablecer tu contraseña de forma automática. Por favor, solicita asistencia directa al Desarrollador / Administrador del Sistema para habilitar tu usuario nuevamente.
            </p>

            <div class="contact-box">
                <p class="contact-title">Contacto de Sistemas</p>
                <div class="contact-list">
                    <a href="mailto:soporte.sistema@despanic.com" class="contact-item">
                        <svg class="icon-mail" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        soporte.sistema@despanic.com
                    </a>
                    <a href="tel:+50588888888" class="contact-item">
                        <svg class="icon-phone" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 5.5A3.5 3.5 0 015.5 2h2.05a2 2 0 011.96 1.58l.4 1.98a2 2 0 01-.48 1.83l-1.6 1.6a14.05 14.05 0 006.58 6.58l1.6-1.6a2 2 0 011.83-.48l1.98.4a2 2 0 011.58 1.96v2.05A3.5 3.5 0 0118.5 22h-1c-8.56 0-15.5-6.94-15.5-15.5v-1z"/>
                        </svg>
                        +505 8888-8888
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('login') }}" class="btn-back">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver al Inicio
        </a>

        <div class="footer">
            DESPANIC S.A. © {{ date('Y') }} — Sistema de Trazabilidad
        </div>
    </div>

</body>
</html>
