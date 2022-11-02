@if(isset($produto_detalhe->id) && $produto_detalhe->id != "")
    <form method="post" action="{{route('produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{route('produto_detalhe.store')}}">
        @csrf
@endif
    <input type="text" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" name="produto_id" class="borda-preta" placeholder="ID do Produto">
        @if($errors->has('produto_id'))
            <small>{{$errors->first('produto_id')}}</small>
        @endif
    <input type="text" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" name="comprimento" class="borda-preta" placeholder="comprimento">

    <input type="text" value="{{$produto_detalhe->largura ?? old('largura')}}" name="largura" class="borda-preta" placeholder="largura">

    <input type="text" value="{{$produto_detalhe->altura ?? old('altura')}}" name="altura" class="borda-preta" placeholder="altura">
    
    <select name="unidade_id">
        <option value="">Selecione a unidade</option>
        @foreach($unidades as $unidade)
            <option {{($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}} value={{$unidade->id}}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
        @if($errors->has('unidade_id'))
            <small>{{$errors->first('unidade_id')}}</small>
        @endif
    

    <button type="submit" class="borda-preta">{{isset($produto_detalhe->id) && $produto_detalhe->id != '' ? 'Atualizar' : 'Adicionar' }}</button>

</form>