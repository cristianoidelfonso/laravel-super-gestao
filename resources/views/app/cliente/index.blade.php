@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Listagem de clientes</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%;margin: 0 auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>


                                <td><a href="{{route('cliente.show', ['cliente'=>$cliente->id]) }}">Ver</a></td>
                                <td><a href="{{route('cliente.edit', ['cliente'=>$cliente->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}"method="post" action="{{route('cliente.destroy', ['cliente'=>$cliente->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{ 'Nenhum cliente cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{$clientes->count()}} clientes de um total de {{$clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
                <br>

{{--
                {{ $clientes->count() }} - Total de registros por pagina.
                <br>
                {{ $clientes->total() }} - Total de registros na consulta.
                <br>
                {{ $clientes->firstItem() }} - Número do primeiro registro na página.
                <br>
                {{ $clientes->lastItem() }} - Número do último registro na página.
--}}

            </div>
        </div>


    </div>

@endsection
