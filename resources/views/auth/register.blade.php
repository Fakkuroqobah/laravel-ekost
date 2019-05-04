<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kos'E | Register</title>

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
                    <form method="POST" action="{{ route('post.register') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">Kos'E</h2>
                        <div class="form-group">
                            <input type="text" class="form-input{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="name" placeholder="Nama Kamu"/>

                            @if ($errors->has('nama'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Email Kamu"/>

                            @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-check" style="margin-bottom: 20px">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-laki">
                            Laki-laki
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan">
                            Perempuan
                          </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="alamat" placeholder="Alamat Kamu"/>

                            @if ($errors->has('alamat'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('alamat') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" id="no_telp" placeholder="Nomor Telepon Kamu"/>

                            @if ($errors->has('no_telp'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_telp') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" autocomplete="off"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>

                            @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Sudah punya akun ? <a href="{{ route('login') }}" class="loginhere-link">Login disini</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/auth.js"></script>
</body>
</html>