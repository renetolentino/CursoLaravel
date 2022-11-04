@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Cliente - Editar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('cliente.index')}}">Voltar</a></li>

                <li><a href="">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                @component('app.cliente._components.form_create_edit', ['cliente' => $cliente])
                    
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