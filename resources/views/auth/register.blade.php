<div class="login-screen">
    <div class="login-container">
        <div class="branding">
            <h1>Wilson XD</h1>
            <p>Crea una nueva cuenta en este equipo para comenzar.</p>
        </div>

        <div class="register-box">
            <div class="avatar-preview">
                <img src="{{ asset('.img/Avatar/PerfilBasico.jfif') }}" alt="User Avatar">
            </div>

            <form action="{{ route('register_proceso') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label>Nombre de usuario</label>
                    <input type="text" name="username" required placeholder="Ej: Administrador">
                </div>

                <div class="input-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" required placeholder="Mínimo 4 caracteres">
                </div>

                <button type="submit" class="btn-register">Crear cuenta</button>
            </form>
        </div>

        <div class="footer-links">
            <a href="{{ route('login_view') }}">Ya tengo una cuenta</a>
        </div>
    </div>
</div>

<style>
    /* Estilos para que se parezca a tu captura de Wilson XD */
    .login-screen {
        background-color: #3b66c4;
        /* El azul de tu imagen */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-family: 'Segoe UI', sans-serif;
    }

    .register-box {
        background: rgba(255, 255, 255, 0.1);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        width: 400px;
    }

    .btn-register {
        background-color: #28a745;
        /* Botón verde como el de tu diseño */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 15px;
    }
</style>