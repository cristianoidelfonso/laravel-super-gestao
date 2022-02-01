{{ $slot }}
<form action="{{route('site.contato')}}" method="POST">

    @csrf

    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$class}}">
    @if ($errors->has('nome')) {{$errors->first('nome')}} @endif

    <br>

    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$class}}">
    {{$errors->has('telefone') ? $errors->first('telefone') : '' }}

    <br>

    <input name="email" value="{{old('email')}}" type="email" placeholder="E-mail" class="{{$class}}">
    {{$errors->has('email') ? $errors->first('email') : '' }}

    <br>

    <select name="motivo_contato_id" class="{{$class}}" >
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{old('motivo_contato_id') == $motivo_contato->id ? 'selected':''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : '' }}

    <br>

    <textarea name="mensagem" class="{{$class}}">{{(old('mensagem')!='')?old('mensagem'):'Preencha aqui a sua mensagem'}}</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : '' }}

    <br>

    <button type="submit" class="{{$class}}">ENVIAR</button>

</form>
