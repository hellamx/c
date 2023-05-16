<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>AdminLTE 3 | {{ $title }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />

        <link rel="stylesheet" href="{{ route('main') }}/public/assets/admin/plugins/fontawesome-free/css/all.min.css" />

        <link rel="stylesheet" href="{{ route('main') }}/public/assets/admin/dist/css/adminlte.min.css?v=3.2.0" />
        
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
            </div>

            @include('admin.alert')
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Авторизация пользователя</p>
                    <form action="{{ route('auth') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="login" value="{{ old('login') }}" class="form-control" placeholder="Логин" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Пароль" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary btn-block">Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{ route('main') }}/public/assets/admin/plugins/jquery/jquery.min.js"></script>

        <script src="{{ route('main') }}/public/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="{{ route('main') }}/public/assets/admin/dist/js/adminlte.min.js?v=3.2.0"></script>
    </body>
</html>
