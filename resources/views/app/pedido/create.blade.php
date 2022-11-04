@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Pedido - Adicionar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('pedido.index')}}">Voltar</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
                    
                @endcomponent

            </div>
            @if(isset($_GET['status']) && $_GET['status'] == 1)
                <div style="width:100%; background-color:green;">
                    <p style="color:white">Cliente registrado com sucesso</p>
                </div>
            @elseif(isset($_GET['status']) && $_GET['status'] == 0)
                <div style="width:100%; background-color:red;">
                    <p style="color:white">Falha ao registrar o cliente no banco de dados</p>
                </div>
            @endif
        </div>

    </div>
@endsection