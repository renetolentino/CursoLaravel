@extends('site.layouts.basico')

@section('titulo', $title)

@section('conteudo')
    
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>
        <div class="informacao-pagina">
            <form action="{{route('site.login')}}" method="post" class="login">
                @csrf

                <label for="usuario">Usuario</label>
                
                <input type="text" name="usuario" placeholder="Usuário" value="{{old('usuario')}}">
                
                @if ($errors->has('usuario'))
                    <small style="color:red;">{{$errors->first('usuario')}}</small>
                @endif
                
                <label for="senha">Senha</label>
                
                <input type="password" name="senha" placeholder="Senha" value="{{old('senha')}}">
                
                @if ($errors->has('senha'))
                    <small style="color:red;">{{$errors->first('senha')}}</small>
                
                @endif
                
                <button type="submit">Entrar</button>
                @if(isset($erro) && $erro == 1)
                    <div class="erro">
                        <p> Usuário e/ou senha não existe! </p>
                    </div>
                @elseif(isset($erro) && $erro == 2)
                    <div class="erro">
                        <p> É necessário fazer o login! </p>
                    </div>
                @endif
            </form>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src=" {{ asset('img/facebook.png') }} ">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection