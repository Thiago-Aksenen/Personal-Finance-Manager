<x-layout title="Despesas">
    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0"></h2>
            <a href="{{ route('despesa.create') }}" class="btn btn-primary">
                Adicionar nova despesa
            </a>
        </div>
        @if ($despesas->isEmpty())
            <div class="text-center">Nenhuma <strong>despesa</strong> encontrada, por favor adicione alguma!</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th colspan="2" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($despesas as $despesa)
                            <tr>
                                <td>{{ $despesa->id }}</td>
                                <td>{{ $despesa->data }}</td>
                                <td>{{ $despesa->categoria }}</td>
                                <td>R$ {{ $despesa->valor }}</td>
                                <td class="text-end">
                                    <a href="{{ route('despesa.edit', $despesa) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td class="text-start">
                                    <form action="{{ route('despesa.destroy', $despesa) }}" method="post"
                                        onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>