<form action="{{ route('despesa.update', $despesa->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="data">Data</label>
    <input type="date" name="data" value="{{ old('data', $despesa->data) }}">
    @error('data')
        <div>{{ $message }}</div>
    @enderror
    <br>

    <label for="categoria">Categoria</label>
    <select name="categoria">
        <option value="contas" {{ old('categoria', $despesa->categoria) == 'contas' ? 'selected' : '' }}>Contas</option>
        <option value="alimentacao" {{ old('categoria', $despesa->categoria) == 'alimentacao' ? 'selected' : '' }}>alimentação
        </option>
        <option value="trasporte" {{ old('categoria', $despesa->categoria) == 'transporte' ? 'selected' : '' }}>Transporte
        </option>
        <option value="compras" {{ old('categoria', $despesa->categoria) == 'compras' ? 'selected' : '' }}>
            Compras</option>
        <option value="outro" {{ old('categoria', $despesa->categoria) == 'outro' ? 'selected' : '' }}>Outro</option>
    </select>
    @error('categoria')
        <div>{{ $message }}</div>
    @enderror
    <br>

    <label for="valor">Valor</label>
    <input type="number" name="valor" value="{{ old('valor', $despesa->valor) }}">
    @error('valor')
        <div>{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">Salvar Alterações</button>
</form>