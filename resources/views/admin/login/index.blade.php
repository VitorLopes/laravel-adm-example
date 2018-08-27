<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Login do Usuário</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <form class="form-signin" method="post" action="{!! route('login.authenticate') !!}">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Login</h2>
            <label for="inputEmail" class="sr-only">E-mail:</label>
            <input type="email" id="inputEmail" name="email" class="form-control" value="{{old('email')}}" placeholder="E-mail do usuário" autofocus>
            <label for="inputPassword" class="sr-only">Senha:</label>
            <input type="password" id="inputPassword" name="password" class="form-control" value="{{old('password')}}" placeholder="Senha do usuário">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="true" name="remember"> Lembrar - me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            @include('admin.errors.validation')
            @include('admin.errors.unsuccessfully')
        </form>

    </div>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
