<x-layout title="Receitas">
    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
    @if ($receitas->isNotEmpty())
        <x-filter>
            <option value="">Todas</option>
            <option value="servico">Servico</option>
            <option value="aluguel">Aluguel</option>
            <option value="investimento">Investimento</option>
            <option value="outro">Outro</option>
        </x-filter>
    @endif
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0"></h2>
            <a href="{{ route('receita.create') }}" class="btn btn-primary">
                Adicionar nova receita
            </a>
        </div>
        @if ($receitas->isEmpty())
            <div class="text-center">Nenhuma <strong>receita</strong> encontrada, por favor adicione alguma!</div>
        @else
        <br>
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
                        @foreach ($receitas as $receita)
                            <tr>
                                <td>{{ $receita->id }}</td>
                                <td>{{ $receita->data }}</td>
                                <td>{{ $receita->categoria }}</td>
                                <td>R$ {{ $receita->valor }}</td>
                                <td class="text-end">
                                    <a href="{{ route('receita.edit', $receita) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td class="text-start">
                                    <form action="{{ route('receita.destroy', $receita) }}" method="post"
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