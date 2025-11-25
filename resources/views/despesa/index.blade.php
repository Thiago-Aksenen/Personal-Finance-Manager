@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<div>
    <h1>Despesas</h1>
    <br>
    <a href="{{ route('despesa.create') }}"><button>Adicionar nova despesa</button></a>
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
        @foreach ($despesas as $despesa)
            <tr>
                <td>{{ $despesa['id'] }}</td>
                <td>{{ $despesa['data'] }}</td>
                <td>{{ $despesa['categoria'] }}</td>
                <td>R$ {{ $despesa['valor'] }}</td>
                <td><a href="{{ route('despesa.edit', $despesa) }}"><button> Editar</button></a></td>
                <td>
                    <form action="{{ route('despesa.destroy', $despesa) }}" method="post"
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