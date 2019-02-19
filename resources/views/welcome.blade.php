<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">
        <title>Laravel</title>
    </head>
    <body>

        <div class="wrapper-form flex">
            <form action="{{ route('auth.create') }}" method="post" id="form-auth" class="flex">
                <p>Авторизация</p>
                <input type="text" placeholder="Имя" name="name">
                <input type="password" placeholder="Пароль" name="password">
                <button>Авторизоваться</button>
            </form>
        </div>

    </body>
</html>
