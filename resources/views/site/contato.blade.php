@extends('site.layouts.basico')

@section('titulo', $title)

@section('conteudo')
    
    
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>
        @if (isset($_GET['status']))
            <div class="aviso-{{$_GET['status']}}">
                @if ($_GET['status'] == 0)
                    <p>Mensagem enviada com sucesso</p>
                @elseif($_GET['status'] == 1)
                    <p>Não foi possível enviar sua mensagem</p>
                @endif
            </div>
        @endif
        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivos_contato' => $motivos_contato])
                    <p>A nossa equipe analisará sua mensagem e retornaremos o mais breve possível</p>
                    <p>Nosso tempo médio de resposta é de 48 horas</p>
                @endcomponent
            </div>
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