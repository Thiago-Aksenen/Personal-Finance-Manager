<x-auth title="Cadastro">
    <div>
        Crie uma conta
        <form action="{{ route('register.store') }}" method="post">
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

            <button type="submit">Criar nova conta</button>
        </form>
        <br>
        Já tem uma conta? Clique em <a href="{{ route('login.login') }}">Login</a>.
    </div>
</x-auth>