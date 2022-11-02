@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Fornecedor</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>

                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                <form method="post" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                    <input type="text" name="site" class="borda-preta" placeholder="Site">
                    <input type="text" name="uf" class="borda-preta" placeholder="UF">
                    <input type="text" name="email" class="borda-preta" placeholder="E-mail">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>

            </div>

        </div>

    </div>
@endsection