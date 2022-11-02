@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Fornecedor - Listar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>

                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right:auto;">

                <table border="1" width="100%">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>U.F</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td>{{$fornecedor->id}}</td>
                                <td>{{$fornecedor->nome}}</td>
                                <td>{{$fornecedor->site}}</td>
                                <td>{{$fornecedor->UF}}</td>
                                <td>{{$fornecedor->email}}</td>
                                <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                                <td><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                            </tr>
                            @if(isset($fornecedor->produtos) && $fornecedor->produtos->count() > 0)
                                <tr>
                                    <td colspan="6">
                                        <p>Lista de produtos:</p>
                                        <table border="1" style="margin:20px">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($fornecedor->produtos as $key => $produto)
                                                    <tr>
                                                        <td>{{$produto->id}}</td>
                                                        <td>{{$produto->nome}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @endif
                            
                        @endforeach

                    </tbody>

                </table>
                {{$fornecedores->appends($request)->links()}}
            </div>

        </div>

    </div>
@endsection