<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('nome'))
        <small style="color: red;"> {{$errors->first('nome')}} </small>
    @endif
    <br>
    <input type="text" name="telefone" value="{{old('telefone')}}" placeholder="Telefone" class="{{$classe}}">
    @if ($errors->has('telefone'))
        <small style="color: red;"> {{$errors->first('telefone')}} </small>
    @endif
    <br>
    <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail" class="{{$classe}}">
    @if ($errors->has('email'))
        <small style="color: red;"> {{$errors->first('email')}} </small>
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Selecione uma opção</option>
        @foreach ($motivos_contato as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : null}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        <small style="color: red;"> {{$errors->first('motivo_contatos_id')}} </small>
    @endif
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">{{old('mensagem') != '' ? old('mensagem') : ''}}</textarea>
    @if ($errors->has('mensagem'))
        <small style="color: red;"> {{$errors->first('mensagem')}} </small>
    @endif
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
    
</form>
<!--
<div style="position: absolute; top:0; left: 0; width:100%; background-color: rgba(255,0,0,1);">
    <pre>
        {{-- print_r($errors) --}}
    </pre>
</div>
-->

{{$slot}}