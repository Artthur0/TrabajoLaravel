<section class="login-screen">
    <div class="login-container">
        <div class="branding">
            <img src="{{ asset('.img/windows.png') }}" alt="Logo" class="windows-logo">
            <h1>Wilson XD</h1>
            <p>Para comenzar, haz clic en tu nombre de usuario e ingresa tu contraseña.</p>
        </div>

        <div class="user-selection">
            @foreach($usuarios as $user)
            <div class="user-card" onclick="selectUser('{{ $user->username }}', this)">
                <img src="{{ asset('.img/Avatar/' . $user->avatar) }}" alt="Avatar">
                <div class="user-info">
                    <span class="username">{{ $user->username }}</span>

                    <div class="password-wrapper">
                        <input type="password" class="temp-password" placeholder="Contraseña" oninput="updateHiddenPass(this.value)" onkeypress="handleKeyPress(event)">

                        <button type="button" class="btn-login" onclick="submitForm()">→</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <form id="login-form" action="{{ route('login_proceso') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="username" id="username">
        <h1> </h1>
        <input type="hidden" name="password" id="password-hidden">
    </form>

    <div class="footer-links">
        <a href="{{ route('register_view') }}">Crear una cuenta en este equipo</a>
    </div>
</section>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        /* Fuente tipo Windows */
    }

    .login-screen {
        width: 100%;
        height: 100vh;
        background-color: #5a7edc;
        /* El azul medio del fondo */
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Franja Superior e Inferior */
    .login-screen::before,
    .login-screen::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 12%;
        /* Ajusta el grosor de las franjas */
        background-color: #003399;
        /* El azul oscuro */
        left: 0;
    }

    .login-screen::before {
        top: 0;
        border-bottom: 2px solid #fff;
    }

    /* Línea blanca sutil */
    .login-screen::after {
        bottom: 0;
        border-top: 2px solid #fff;
    }

    .login-container {
        display: flex;
        width: 80%;
        max-width: 1000px;
        z-index: 10;
    }

    /* Sección Izquierda (Logo y Título) */
    .branding {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        padding-right: 40px;
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        /* Línea divisoria */
    }

    .branding .windows-logo {
        width: 100px;
        /* Tamaño del logo */
        height: auto;
        margin-bottom: 20px;
    }

    .branding h1 {
        font-size: 3em;
        font-weight: lighter;
        margin: 0 0 10px 0;
    }

    .branding p {
        font-size: 1.1em;
        max-width: 300px;
        margin: 0;
        line-height: 1.4;
    }

    /* Sección Derecha (Usuarios) */
    .user-selection {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 40px;
        gap: 15px;
        /* Espacio entre tarjetas */
    }

    /* Estilo general de la tarjeta */
    .user-card {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        border: 2px solid transparent;
        /* Para el efecto hover/active */
    }

    /* Efecto al pasar el ratón */
    .user-card:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Estado Activo (Cuando está seleccionado) */
    .user-card.active {
        background-color: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .user-card .avatar {
        width: 64px;
        height: 64px;
        border-radius: 4px;
        /* O '50%' si quieres que sean circulares como en W10 */
        border: 2px solid #fff;
        object-fit: cover;
        margin-right: 15px;
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .username {
        color: white;
        font-size: 1.2em;
        margin-bottom: 5px;
    }

    /* Contenedor de contraseña e input */
    .password-wrapper {
        display: flex;
        align-items: center;
        gap: 5px;
        overflow: hidden;
        /* Para la transición */
        max-height: 0;
        /* Oculto por defecto */
        transition: max-height 0.3s ease-out;
    }

    .user-card.active .password-wrapper {
        max-height: 50px;
        /* Se expande cuando está activo */
        margin-top: 5px;
    }

    .temp-password {
        padding: 5px 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 0.9em;
        width: 150px;
    }

    /* Botón de envío (La flecha clásica) */
    .btn-login {
        background-color: #4CAF50;
        /* Verde XP */
        color: white;
        border: none;
        border-radius: 4px;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 1.2em;
        padding: 0;
    }

    .btn-login:hover {
        background-color: #5cb85c;
    }

    /* Link Inferior */
    .footer-links {
        position: absolute;
        bottom: 4%;
        /* Centrado en la franja inferior */
        right: 5%;
        z-index: 10;
    }

    .footer-links a {
        color: white;
        text-decoration: none;
        font-size: 0.9em;
    }

    .footer-links a:hover {
        text-decoration: underline;
    }
</style>
<script>
    let selectedUsername = null;

    function selectUser(username, element) {
        document.querySelectorAll('.user-card').forEach(card => {
            card.classList.remove('active');
        });

        element.classList.add('active');
        selectedUsername = username;

        setTimeout(() => {
            element.querySelector('.temp-password').focus();
        }, 100);
        document.getElementById('username').value = username;
    }

    function updateHiddenPass(val) {
        document.getElementById('password-hidden').value = val;
    }

    function handleKeyPress(e) {
        if (e.key === 'Enter') {
            submitForm();
        }
    }

    function submitForm() {
        if (selectedUsername && document.getElementById('password-hidden').value) {
            document.getElementById('login-form').submit();
        } else {
            alert("Por favor, selecciona un usuario e ingresa la contraseña.");
        }
    }
</script>