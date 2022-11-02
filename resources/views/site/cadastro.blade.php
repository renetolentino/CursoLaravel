@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastro</h1>
        </div>
        <div class="cadastro-form">
            <form action="{{route('site.cadastrar')}}" method="post">
                @csrf
                <input name="name" type="text" placeholder="Nome">
                @if ($errors->has('name'))
                    <small class="form-erro"> {{$errors->first('name')}} </small>
                @endif
                <input name="email" type="text" placeholder="E-mail">
                @if ($errors->has('email'))
                    <small class="form-erro"> {{$errors->first('email')}} </small>
                @endif
                <input type="password" name="password" placeholder="Senha">
                @if ($errors->has('password'))
                    <small class="form-erro"> {{$errors->first('password')}} </small>
                @endif
                <button type="submit">Cadastrar</button>
            </form>
            @if (isset($status) && $status == 1)
                <div style="background-color: green; color:white;">
                    <p> Cadastro realizado com sucesso, verifique seu email para confirmar o cadastro </p>
                </div>
            @elseif(isset($status) && $status == 0)
                <div style="background-color: red; color: white;">
                    <p> Não foi possível realizar seu cadastro, tente novamente mais tarde </p>
                </div>
            @endif
        </div>
    </div>
@endsection