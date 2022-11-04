@if(isset($pedido->id))
    <form method="post" action="{{route('pedido.update', ['pedido' => $pedido->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{route('pedido.store')}}">
        @csrf
@endif
    <select name="cliente_id" id="cliente_id">
        <option value="">Selecione um cliente</option>
        @foreach ($clientes as $cliente)
            <option {{$cliente->id == ($pedido->cliente_id ?? old('cliente_id')) ? 'selected' : ''}} value={{$cliente->id}}>{{$cliente->nome}}</option>
        @endforeach
    </select>

    <button type="submit" class="borda-preta">{{isset($pedido->id) ? 'Atualizar' : 'Cadastrar' }}</button>

</form>