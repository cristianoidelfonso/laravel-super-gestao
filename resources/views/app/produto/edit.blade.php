@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Produto - Editar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                {{-- <li><a href="">Consulta</a></li> --}}
            </ul>
        </div>

        <div class="informacao-pagina">

            {{ $msg ?? '' }}

            <div style="width: 30%;margin: 0 auto;">
                @component('app.produto._components.form_create_edit',
                    [
                        'btn' => 'Atualizar',
                        'produto' => $produto,
                        'unidades' => $unidades,
                        'fornecedores' => $fornecedores
                    ]
                )

                @endcomponent
            </div>
        </div>


    </div>

@endsection
