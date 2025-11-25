@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<div>
    <h1>Receitas</h1>
    <br>
    <a href="{{ route('receita.create') }}"><button>Adicionar nova receita</button></a>
    <br>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>#</th>
            <th>#</th>
        </tr>
        @foreach ($receitas as $receita)
            <tr>
                <td>{{ $receita['id'] }}</td>
                <td>{{ $receita['data'] }}</td>
                <td>{{ $receita['categoria'] }}</td>
                <td>R$ {{ $receita['valor'] }}</td>
                <td><a href="{{ route('receita.edit', $receita) }}"><button> Editar</button></a></td>
                <td>
                    <form action="{{ route('receita.destroy', $receita) }}" method="post"
                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit"> Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>