@extends('app.layouts.basico')

@section('title', $titulo)

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <h1>Fornecedor</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            {{-- <div style="width: 30%;margin: 0;">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>SITE</th>
                            <th>UF</th>
                            <th>E-MAIL</th>
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
                            </tr>
                        @empty
                            {{ 'Nenhum fornecedor cadastrado.' }}
                        @endforelse
                    </tbody>
                </table>
            </div> --}}

            <div style="width: 30%;margin: 0 auto;">
                <form action="{{ route('app.fornecedor.listar') }}" method="post">
                    @csrf
                    <input type="text" name="nome" id="nome" class="borda-preta" placeholder="Nome">
                    <input type="text" name="site" id="site" class="borda-preta" placeholder="Site">
                    <input type="text" name="uf" id="uf" class="borda-preta" placeholder="UF">
                    <input type="email" name="email" id="email" class="borda-preta" placeholder="E-mail">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>


    </div>

@endsection
