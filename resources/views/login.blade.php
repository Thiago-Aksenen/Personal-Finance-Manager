<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <style>
        .login-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 700px;
            padding: 30px;
            background: rgba(53, 53, 53, 1);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(53, 53, 53, 1);
            max-width: 500px;
            width: 100%;
        }

    </style>
</head>

<body style="background-color: lightblue; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container-form">


        <form action="/enter" method="POST" novalidate>
            @csrf
            <div class="container login-box">
                <i class="bi bi-person-circle"
                    style="font-size: 3rem; display: block; text-align: center; color: white;"></i>
                <h1 class="text-center" , style="color: white;">Seja bem-vindo de volta!</h1>

                <div class="form-group">
                    <label for="Email" style="color: white;">E-mail:</label>
                    <br>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" value="{{ old('email') }}">
                    <br>
                </div>

                <div class="form-group">
                    <label for="Senha" style="color: white;">Senha:</label>
                    <br>
                    <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" value="{{ old('password') }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block rounded-pill">Login</button>
            </div>
        </form>
    </div>

</body>

</html>