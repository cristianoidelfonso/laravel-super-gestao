<form action="{{ route('pedido-produto.store', ['pedido'=>$pedido]) }}" method="post">
    @csrf

    {{-- <input type="hidden" name="id" id="id" value="{{ $cliente->id ?? '' }}"> --}}

    <select name="produto_id" id="produto_id">
        <option value="">-- Selecione um produto --</option>
        @foreach ($produtos as $produto)
            {{-- <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option> --}}
            <option value="{{$produto->id}}"
                {{ old('cliente_id') == $produto->id ? 'selected' : ''}}>
                {{ $produto->nome }}
            </option>
            @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" name="quantidade" id="quantidade"
        value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="Quantidade" class="borda-preta">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="borda-preta">{{$btn}}</button>
</form>
