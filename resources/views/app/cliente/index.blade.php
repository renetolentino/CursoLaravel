@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Listagem - Clientes</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('cliente.create')}}">Novo</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right:auto;">

                @if(isset($_GET['status']) && $_GET['status'] == 1)
                    <div style="width: 100%; background-color:green;">
                        <p style="color:white">Dados atualizados com sucesso</p>
                    </div>
                @elseif(isset($_GET['status']) && $_GET['status'] == 0)
                    <div style="width: 100%; background-color:red;">
                        <p style="color:white">Dados atualizados com sucesso</p>
                    </div>
                @endif

                <table border="1" width="100%">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td><a href="{{route('cliente.show', ['cliente' => $cliente])}}">Visualizar</a></td>
                                <td>
                                    <form id="excluir_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('excluir_{{$cliente->id}}').submit()">Excluir</button>
                                    </form>
                                </td>
                                <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $clientes->links() }}
        </div>

    </div>
@endsection