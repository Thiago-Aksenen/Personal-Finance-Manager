<x-layout title="Login">
    <div>
        Fazer login
        <form action="{{ route('login.store') }}" method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}">

            @error('nome')
                {{ $message }}
            @enderror

            <label for="nome">Senha</label>
            <input type="text" name="senha" value="{{ old('senha') }}">
            @error('senha')
                {{ $message }}
            @enderror

            <button type="submit">Fazer login</button>
        </form>
        @if (session('message'))
            {{ session('message') }}
        @endif
        <br>
        Ainda não tem uma conta? Clique em <a href="{{ route('register.create') }}">Cadastrar</a>.
    </div>
</x-layout>