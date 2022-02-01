@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido'=>$pedido->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
        @csrf
@endif
        {{-- <input type="hidden" name="id" id="id" value="{{ $cliente->id ?? '' }}"> --}}

        <select name="cliente_id" id="fornecedor_id">
            <option value="">-- Selecione o cliente --</option>
            @foreach ($clientes as $cliente)
                {{-- <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option> --}}
                <option value="{{$cliente->id}}"
                    {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>
                    {{$cliente->nome}}
                </option>
                @endforeach
        </select>
        {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

        <button type="submit" class="borda-preta">{{$btn}}</button>
    </form>
