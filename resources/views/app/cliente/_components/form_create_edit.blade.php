@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente'=>$cliente->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif
        {{-- <input type="hidden" name="id" id="id" value="{{ $cliente->id ?? '' }}"> --}}

        <input type="text" name="nome" id="nome" value="{{ $cliente->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <button type="submit" class="borda-preta">{{$btn}}</button>
    </form>
