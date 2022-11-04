@if(isset($produto->id))
    <form method="post" action="{{route('produto.update', ['produto' => $produto->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{route('produto.store')}}">
        @csrf
@endif
    <input hidden name="id" value="{{isset($produto->id) ? $produto->id : '' }}">
    
    <select name="fornecedor_id">
        <option value="">Selecione um fornecedor</option>
        @foreach($fornecedores as $fornecedor)
            <option {{$fornecedor->id == ($produto->fornecedor_id ?? old('fornecedor_id')) ? 'selected' : ''}} value={{$fornecedor->id ?? old('fornecedor_id')}}>{{$fornecedor->nome}}</option>
        @endforeach
    </select>
        @if($errors->has('fornecedor_id'))
            <small> {{$errors->first('fornecedor_id')}} </small>
        @endif

    <input type="text" value="{{$produto->nome ?? old('nome')}}" name="nome" class="borda-preta" placeholder="Nome">
        @if($errors->has('nome'))
            <small>{{$errors->first('nome')}}</small>
        @endif
    <input type="text" value="{{$produto->peso ?? old('peso')}}" name="peso" class="borda-preta" placeholder="Peso">
    
    <select name="unidade_id">
        <option value="">Selecione a unidade de peso</option>
        @foreach($unidades as $unidade)
            <option {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}} value={{$unidade->id}}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
        @if($errors->has('unidade_id'))
            <small>{{$errors->first('unidade_id')}}</small>
        @endif
    <textarea placeholder="Descrição" name="descricao">{{$produto->descricao ?? old('descricao')}}</textarea>

    <button type="submit" class="borda-preta">{{isset($produto->id) && $produto->id != '' ? 'Atualizar' : 'Adicionar' }}</button>

</form>