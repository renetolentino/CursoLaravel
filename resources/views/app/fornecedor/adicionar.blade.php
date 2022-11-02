@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina-app">

            <h1>Fornecedor - Adicionar</h1>

        </div>

        <div class="menu">

            <ul>

                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>

                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>

            </ul>

        </div>

        <div class="informacao-pagina">

            <div class="form-fornecedores">

                <form method="post" action=" {{route('app.fornecedor.adicionar')}} ">
                    @csrf
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">

                    <input type="text" value="{{$fornecedor->nome ?? old('nome')}}" name="nome" class="borda-preta" placeholder="Nome">
                    @if ($errors->has('nome'))
                        <small style="color:red"> {{$errors->first('nome')}} </small>
                    @endif
                    
                    <input type="text" value="{{$fornecedor->site ?? old('site')}}" name="site" class="borda-preta" placeholder="Site">
                    
                    <input type="text" value="{{$fornecedor->UF ?? old('UF')}}" name="UF" class="borda-preta" placeholder="UF">
                    @if ($errors->has('UF'))
                        <small style="color:red"> {{$errors->first('UF')}} </small>
                    @endif
                    
                    <input type="text" value="{{$fornecedor->email ?? old('email')}}" name="email" class="borda-preta" placeholder="E-mail">
                    @if ($errors->has('email'))
                        <small style="color:red"> {{$errors->first('email')}} </small>
                    @endif
                    <button type="submit" class="borda-preta">{{isset($fornecedor) ? 'Atualizar' : 'Cadastrar' }}</button>
                </form>
                
                @if (isset($_GET['status']) && $_GET['status'] == 0)
                    <div style="background-color: red;">
                        <p style=" color:white;">Não foi possível realizar a operação no momento, tente novamente depois</p>
                    </div>
                @elseif(isset($_GET['status']) && $_GET['status'] == 1)
                    <div style="background-color: green; color:white;">
                        <p style=" color:white;">Fornecedor cadastrado com sucesso.</p>
                    </div>
                @elseif(isset($_GET['status']) && $_GET['status'] == 2)
                    <div style="background-color: yellow; color:white;">
                        <p style=" color:black;">Fornecedor já está cadastrado no banco de dados.</p>
                    </div>
                @endif
            </div>

        </div>

    </div>
@endsection