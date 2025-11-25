<header class="header-animado d-flex justify-content-between align-items-center p-3 border-bottom shadow-sm">

    <h3 class="m-0 text-white">
        {{ $title ?? 'Página' }}
    </h3>

    <div class="d-flex align-items-center gap-3">

        <a href="{{ route('perfil') }}" class="text-decoration-none">
            <span class="text-light">
                {{ Auth::user()->nome }}
            </span>
        </a>

        <form action="{{ route('login.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
                Sair
            </button>
        </form>
    </div>

</header>