<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos'E | Login</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/auth.css">
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
</head>
<body>

    {{-- alert --}}
    @include('partials.alert')

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="{{ route('post.login') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">KOS'E</h2>
                        <div class="form-group">
                            <input type="email" class="form-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Email Kamu"/>

                            @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" autocomplete="off" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>

                            @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Belum punya akun ? <a href="{{ route('register') }}" class="loginhere-link">Daftar disini</a> <br>
                        Pemilik kost ? <a href="{{ route('login.pemilik') }}" class="loginhere-link">Login disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/auth.js"></script>
</body>
</html>