<x-auth title="Login">
    <div class="d-flex justify-content-center align-items-center vh-100" style="background: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.comececomopedireito.com.br%2Fblog%2Fwp-content%2Fuploads%2F2022%2F08%2Frodadas-de-investimento-startup.jpg&f=1&nofb=1&ipt=a9e00920102d4084f56894584b1cf6d0002a006232bf241a7f9032544e375caa') 
                no-repeat center center/cover;">

        <div class="card shadow-lg p-5 text-white"
            style="width: 550px; backdrop-filter: blur(9px); background-color: rgba(12, 12, 12, 0.85);">
            <div class="text-center mb-3">
                <i class="bi bi-person-circle" style="font-size: 64px; color: white;"></i>
            </div>
            <h3 class="text-center mb-4 text-white">Seja bem vindo de volta!</h3>

            <form action="{{ route('login.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label text-white">Nome</label>
                    <input type="text" name="nome" class="form-control bg-dark text-white border-secondary"
                        value="{{ old('nome') }}">
                    @error('nome')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label text-white">Senha</label>
                    <input type="password" name="senha" class="form-control bg-dark text-white border-secondary"
                        value="{{ old('senha') }}">
                    @error('senha')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Fazer login</button>
            </form>

            @if (session('message'))
                <div class="text-danger mt-3 text-center">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mt-4 text-center">
                <span class="text-white">Ainda não tem uma conta?</span>
                <a href="{{ route('register.create') }}" class="text-info">Cadastrar</a>.
            </div>
        </div>

    </div>
</x-auth>