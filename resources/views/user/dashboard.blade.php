<x-layout title="Dashboard">
    <div class="container-fluid py-4">

        <div class="card shadow-sm mb-4 bg-light">
            <div class="card-body">
                <h5 class="card-title text-primary mb-3">
                    <i class="bi bi-filter"></i>
                    Filtrar Período
                </h5>

                <form class="d-flex align-items-end gap-3" method="GET">

                    <div style="flex: 1;">
                        <label for="data_inicio" class="form-label">Data inicial</label>
                        <input type="date" name="data_inicio" id="data_inicio" value="{{ request('data_inicio') }}"
                            class="form-control">
                    </div>

                    <div style="flex: 1;">
                        <label for="data_fim" class="form-label">Data final</label>
                        <input type="date" name="data_fim" id="data_fim" value="{{ request('data_fim') }}"
                            class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-white bg-primary shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Atual</h5>
                        <p class="card-text fs-2">R$
                            {{ number_format($SaldoAtual, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-white bg-success shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Total de Receita</h5>
                        <p class="card-text fs-2">R$
                            {{ number_format($TotalReceita, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card text-white bg-danger shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title">Total de Despesa</h5>
                        <p class="card-text fs-2">R$
                            {{ number_format($TotalDespesa, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-layout>