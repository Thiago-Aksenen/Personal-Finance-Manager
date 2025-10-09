@extends('layouts.main_layout')

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @section('content')
    <div class="container" style="height:100vh;"> <!-- altura total da tela -->
        <div class="row" style="height:100%; display:flex; align-items:center;">
            <!-- Coluna do Form -->
            <div class="col-md-5">
                <h2>Crie uma conta!</h2>
                <form method="POST" action="{{ route('register.post') }}" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="usr">Login:</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                     @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="pwd">Senha:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                     @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
                <div>
                    <strong>Já tem uma conta? Faça <a href="{{ route('login') }}">Login</a></strong>
                </div>
            </div>

            <!-- Coluna da Imagem -->
            <div class="col-md-7" style="display:flex; align-items:center; justify-content:center;">
                <img src="{{ asset('images/grafico2.jpg') }}" style="width:80%; height:auto;"
                    class="img-responsive img-rounded" alt="Imagem Exemplo">

            </div>
        </div>
    </div>
    @endsection('homepage')

</body>

</html>
