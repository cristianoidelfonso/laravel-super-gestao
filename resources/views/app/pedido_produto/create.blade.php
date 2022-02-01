@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Adicionar produtos ao pedido</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            {{ $msg ?? '' }}

            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 30%;margin: 0 auto;">
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th># ID</th>
                            <th>NOME DO PRODUTO</th>
                            <th>DATA DE INCLUSÃO DO ITEM</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y  - H:i:s') }}</td>
                                <td>
                                    {{-- <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" --}}
                                    <form id="form_{{$produto->pivot->id}}" method="post"
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto'=>$produto->pivot->id, 'pedido_id'=>$pedido->id]) }}">
                                        @csrf
                                        @method("DELETE")
                                        <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>

                @component('app.pedido_produto._components.form_create',
                    [
                        'btn' => 'Cadastrar',
                        'pedido' => $pedido,
                        'produtos' => $produtos,

                    ]
                )

                @endcomponent
            </div>
        </div>


    </div>

@endsection
