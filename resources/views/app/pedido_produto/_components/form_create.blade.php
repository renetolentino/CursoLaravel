
<form method="post" action="{{route('pedido_produto.store', ['pedido'=>$pedido])}}">
    @csrf

    <select name="produto_id" id="produto_id">
        <option value="">Selecione um produto</option>
        @foreach ($produtos as $produto)
            <option {{$produto->id == ($pedido->produto_id ?? old('produto_id')) ? 'selected' : ''}} value={{$produto->id}}>{{$produto->nome}}</option>
        @endforeach
    </select>

    <input type="number" name="quantidade" value="{{old('quantidade')}}" placeholder="Quantidade" class="borda-preta">

    <button type="submit" class="borda-preta">Adicionar</button>

</form>