@if(isset($cliente->id))
    <form method="post" action="{{route('cliente.update', ['cliente' => $cliente->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{route('cliente.store')}}">
        @csrf
@endif
    
    <input type="text" value="{{$cliente->nome ?? old('nome')}}" name="nome" class="borda-preta" placeholder="Nome">
        @if($errors->has('nome'))
            <small>{{$errors->first('nome')}}</small>
        @endif

    <button type="submit" class="borda-preta">{{isset($cliente->id) && $cliente->id != '' ? 'Atualizar' : 'Cadastrar' }}</button>

</form>