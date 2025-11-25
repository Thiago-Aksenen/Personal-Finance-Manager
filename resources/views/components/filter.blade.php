<form method="GET" action="{{ $action ?? url()->current() }}" class="row g-3 mb-4">

    <div class="col-md-3">
        <label class="form-label">Categoria</label>
        <select name="categoria" class="form-select">
            {{ $slot }}
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Data inicial</label>
        <input type="date" name="data_inicio" value="{{ request('data_inicio') }}" class="form-control">
    </div>

    <div class="col-md-3">
        <label class="form-label">Data final</label>
        <input type="date" name="data_fim" value="{{ request('data_fim') }}" class="form-control">
    </div>

    <div class="col-md-3 d-flex align-items-end">
        <button class="btn btn-dark w-100">Filtrar</button>
    </div>

</form>