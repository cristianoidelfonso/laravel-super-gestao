@extends('site.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal"  style="width:75%;margin: 0 auto;">
                @component('site.layouts._components.form_contato',['class'=>'borda-preta','motivo_contatos'=>$motivo_contatos])
                    <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível !</p>
                    <p>O nosso tempo médio de resposta é de 48 horas.</p>
                @endcomponent
            </div>
        </div>
    </div>

@endsection

@section('rodape')
    @include('site.layouts._partials.rodape')
@endsection
