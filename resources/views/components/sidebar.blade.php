<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 240px; min-height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : 'link-dark' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('despesa.index') }}"
                class="nav-link {{ request()->routeIs('despesa.*') ? 'active' : 'link-dark' }}">
                Despesas
            </a>
        </li>

        <li>
            <a href="{{ route('receita.index') }}"
                class="nav-link {{ request()->routeIs('receita*') ? 'active' : 'link-dark' }}">
                Receitas
            </a>
        </li>

    </ul>

    <hr>
    <a href="{{ route('perfil') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : 'link-dark' }}">
        Perfil
    </a>
    <form action="{{ route('login.logout') }}" method="post" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-link p-0 text-danger" style="text-decoration:none;">
            Sair
        </button>
    </form>

</div>