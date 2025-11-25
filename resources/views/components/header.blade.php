<header class="d-flex justify-content-between align-items-center p-3 border-bottom bg-white shadow-sm">

    <h3 class="m-0">
        {{ $title ?? 'Página' }}
    </h3>

    <div class="d-flex align-items-center gap-3">

        <a href="{{ route('perfil') }}">
            <span class="text-muted">
                {{ Auth::user()->nome }}
            </span>
        </a>

        <form action="{{ route('login.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">
                Sair
            </button>
        </form>
    </div>

</header>