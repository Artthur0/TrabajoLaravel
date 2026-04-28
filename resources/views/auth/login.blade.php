<section class="login-screen">
    <div class="login-container">
        <div class="branding">
            <img src="{{ asset('img/windows_logo.png') }}" alt="Logo">
            <h1>Wilson XD</h1>
            <p>Para comenzar, haz clic en tu nombre de usuario e ingresa tu contraseña.</p>
        </div>

        <div class="user-selection">
            {{-- Aquí iteramos los usuarios que vienen del controlador --}}
            @foreach($usuarios as $user)
            <div class="user-card" onclick="document.getElementById('username').value = '{{ $user->username }}'">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                <div class="user-info">
                    <span class="username">{{ $user->username }}</span>
                    <input type="password" name="password" placeholder="Contraseña" form="login-form">
                </div>
            </div>
            @endforeach
        </div>

        <form id="login-form" action="{{ route('login_proceso') }}" method="POST">
            @csrf
            <input type="hidden" name="username" id="username">
            <button type="submit" class="btn-login">Ingresar</button>
        </form>

        <div class="footer-links">
            <a href="{{ route('register_view') }}">Crear una cuenta en este equipo</a>
        </div>
    </div>
</section>