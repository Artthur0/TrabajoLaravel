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
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="avatar">
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
        <input type="hidden" name="password" id="password-hidden">
    </form>

    <div class="footer-links">
        <a href="{{ route('register_view') }}">Crear una cuenta en este equipo</a>
    </div>
</section>

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