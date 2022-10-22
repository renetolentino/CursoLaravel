<h3> Fornecedores </h3>

@isset($fornecedores)

    @for ( $i= 0;isset($fornecedores[$i]); $i++)
        Fornecedor: {{$fornecedores[$i]['fornecedor']}}
        <br />
        Status: {{$fornecedores[$i]['status']}}
        <br />
        CNPJ: {{$fornecedores[$i]['cnpj']}}
        <br />
        Telefone: {{$fornecedores[$i]['ddd'] ?? ''}} {{$fornecedores[$i]['telefone'] ?? ''}}
        <br />
        Estado: @switch ($fornecedores[$i]['ddd'])
                    @case('21')
                        {{'Rio de Janeiro - RJ'}}
                        @break
                    @case ('34')
                        {{'Belo Horizonte - MG'}}
                        @break
                    @case ('61')
                        {{'Distrito Federal - DF'}}
                        @break
                    @default
                        {{'Não foi possível recuperar o estado'}}
                @endswitch
        <hr />
    @endfor

@endisset