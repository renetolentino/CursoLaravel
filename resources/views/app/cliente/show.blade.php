@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Listagem - Clientes</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('cliente.index')}}">Voltar</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">
            <h4> Informações do Cliente </h4>

            <div style="width: 90%; margin-left: auto; margin-right:auto;">

                <table border="1" width="100%">

                    <tr>
                        <td>Id:</td>
                        <td>{{$cliente->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{$cliente->nome}}</td>
                    </tr>

                </table>
        </div>

    </div>
@endsection