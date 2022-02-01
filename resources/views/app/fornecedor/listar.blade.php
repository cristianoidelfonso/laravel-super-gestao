@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Fornecedor - Listar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 80%;margin: 0 auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>SITE</th>
                            <th>UF</th>
                            <th>E-MAIL</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{route('app.fornecedor.editar', $fornecedor->id )}}">Editar</a></td>
                                <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id )}}">Excluir</a></td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <p>Lista de produtos</p>
                                    <table border="1" style="margin:15px;">
                                        <thead>
                                            <th>ID</th>
                                            <th>NOME</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                </tr>
                                            @empty
                                                {{'Sem produtos cadastrados.'}}
                                            @endforelse
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            {{ 'Nenhum fornecedor cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>

                {{ $fornecedores->appends($request)->links() }}
                <br>
                Exibindo {{$fornecedores->count()}} fornecedores de um total de {{$fornecedores->total()}} (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})
                <br>

{{--
                {{ $fornecedores->count() }} - Total de registros por pagina.
                <br>
                {{ $fornecedores->total() }} - Total de registros na consulta.
                <br>
                {{ $fornecedores->firstItem() }} - Número do primeiro registro na página.
                <br>
                {{ $fornecedores->lastItem() }} - Número do último registro na página.
--}}

            </div>
        </div>


    </div>

@endsection
