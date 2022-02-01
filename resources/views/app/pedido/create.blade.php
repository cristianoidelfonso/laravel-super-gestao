@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Adicionar Pedido</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            {{ $msg ?? '' }}

            <div style="width: 30%;margin: 0 auto;">
                @component('app.pedido._components.form_create_edit',
                    [
                        'btn' => 'Cadastrar',
                        'clientes' => $clientes,
                        // 'unidades' => $unidades,
                        // 'fornecedores'=> $fornecedores
                    ]
                )

                @endcomponent
            </div>
        </div>


    </div>

@endsection
