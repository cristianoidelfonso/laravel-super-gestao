@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe'=>$produto_detalhe->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
        @csrf
@endif
        {{-- <input type="hidden" name="id" id="id" value="{{ $produto_detalhe->id ?? '' }}"> --}}

        <input type="text" name="produto_id" id="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="borda-preta" placeholder="ID do produto">
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="text" name="comprimento" id="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="borda-preta" placeholder="Comprimento">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

        <input type="text" name="largura" id="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" class="borda-preta" placeholder="Largura">
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}

        <input type="text" name="altura" id="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" class="borda-preta" placeholder="Altura">
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}

        <select name="unidade_id" id="unidade_id">
            <option value="">-- Selecione a unidade de medida --</option>
            @foreach ($unidades as $unidade)
                {{-- <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option> --}}
                <option value="{{$unidade->id}}"
                    {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>
                    {{$unidade->descricao}}
                </option>
                @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        <button type="submit" class="borda-preta">{{$btn}}</button>
    </form>
