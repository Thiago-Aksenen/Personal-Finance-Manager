<x-layout title="Perfil">

    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="fw-bold text-secondary">Nome</label>
                            <p class="mb-0 fs-5">
                                {{ auth()->user()->nome }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold text-secondary">Email</label>
                            <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                        </div>

                        <hr>

                        <div class="mb-2">
                            <label class="fw-bold text-secondary">Total de receitas adicionadas</label>
                            <p class="fs-5">{{ $totalReceitas ?? 0 }}</p>
                        </div>

                        <div>
                            <label class="fw-bold text-secondary">Total de despesas adicionadas</label>
                            <p class="fs-5">{{ $totalDespesas ?? 0 }}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</x-layout>