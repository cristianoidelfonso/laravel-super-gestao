@extends('site.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%;margin-left:auto;margin-right:auto;">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input type="text" name="usuario" value="{{old('usuario')}}" class="borda-preta" placeholder="Usuário">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}

                    <input type="password" name="senha" value="{{old('senha')}}" class="borda-preta" placeholder="Senha">
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}

                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>
    </div>

@endsection
