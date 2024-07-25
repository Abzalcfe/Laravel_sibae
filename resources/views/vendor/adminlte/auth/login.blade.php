<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBAE Login</title>
    <link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
    @php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
    @php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
    @php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))
    @if (config('adminlte.use_route_url', false))
        @php($login_url = $login_url ? route($login_url) : '')
        @php($register_url = $register_url ? route($register_url) : '')
        @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
    @else
        @php($login_url = $login_url ? url($login_url) : '')
        @php($register_url = $register_url ? url($register_url) : '')
        @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
    @endif
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="booking-bg">
                            <div class="form-header">
                                <p>SIBAE</p>
                                <h2>Sistema de Gestión de Balance de Energía</h2>
                                <p>Comisión Federal de Electricidad</p>
                            </div>
                        </div>
                        <form action="{{ $login_url }}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <center>
                                        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}"
                                            width="160px" height="120px">
                                    </center>
                                </div>
                            </div>
                            <BR></BR>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Correo Electrónico</span>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Correo Electrónico" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Contraseña</span>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Contraseña">

                                        <input type="checkbox" class="btn btn-outline-secondary" id="togglePassword">
                                        <label for="togglePassword">Mostrar contraseña</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('togglePassword').addEventListener('click', function(e) {
                                    const passwordInput = document.getElementById('password');
                                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);

                                    // Cambia el texto del label según el estado
                                    const label = document.querySelector('label[for="togglePassword"]');
                                    label.textContent = type === 'password' ? 'Mostrar contraseña' : 'Ocultar contraseña';
                                });
                            </script>

                            <div class="row">
                                <div class="form-btn">
                                    <button type="submit"
                                        class="submit-btn {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                        <span class="fas fa-sign-in-alt"></span>
                                        ACCEDER
                                    </button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
