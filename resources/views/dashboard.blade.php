dashboard do {{ auth()->user()->nome }}
<br>
<a href="{{ route('receita.index') }}">receitas</a>
<br>
<a href="{{ route('despesa.index') }}">despesas</a>
<br>
<a href="{{ route('perfil') }}">perfil</a>
<br>
<br>
<form action="{{ route('login.logout') }}" method="post"> @csrf <button type="submit">Fazer logout</button> </form>