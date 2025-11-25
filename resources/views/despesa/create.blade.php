<x-layout title="Adicionar despesa">
    <form action="{{ route('despesa.store') }}" method="post">
        @csrf

        <label for="data">Data</label>
        <input type="date" name="data" value="{{ old('data') }}">
        @error('data')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <option value="contas">Contas</option>
            <option value="alimentacao">Alimentacao</option>
            <option value="transporte">Transporte</option>
            <option value="compras">Compras</option>
            <option value="outro">Outro</option>
        </select>
        @error('categoria')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="valor">Valor</label>
        <input type="number" name="valor" step="0.01" value="{{ old('valor') }}">
        @error('valor')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</x-layout>