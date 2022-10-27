

<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome" class="{{$classe}}">
    <br>
    <input type="text" name="telefone" value="{{old('telefone')}}" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option>Selecione uma opção</option>
        @foreach ($motivos_contato as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : null}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">{{old('mensagem') != '' ? old('mensagem') : ''}}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
    
</form>
<!--
<div style="position: absolute; top:0; left: 0; width:100%; background-color: rgba(255,0,0,1);">
    <pre>
        {{print_r($errors)}}
    </pre>
</div>
-->

{{$slot}}