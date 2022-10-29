<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ContatoController extends Controller
{
    //
    public function contato(Request $request) {
        
        $motivos_contato = MotivoContato::all();

        return view('site.contato', [
            'title' => 'Contato', 
            'motivos_contato' => $motivos_contato
            ]
        );
    }

    public function salvar(Request $request) {

        $msgDuplicada = false;

        //Realizar a validação dos dados do formulário recebidos no $request
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        //dd($request->nome);

        //Estou verificando se já existe este email atribuído ao banco de dados
        $contatos = SiteContato::where('email', $request->email)->get()->toArray();

        //Se existir entraremos na condição abaixo
        //NOTE QUE AQUI SÓ ENTRAREMOS SE O ARRAY RETORNADO ACIMA NÃO ESTIVER VAZIO
        if(!empty($contatos)){
            //aqui verifica se já existe uma mesma mensagem atribuido
            //a este email para evitar que existam mensagens duplicadas
            //de um mesmo usuário
            $contatos = SiteContato::where('email', $request->email)
                        ->where('mensagem', $request->mensagem)
                        ->get();
            $contatos[0]->mensagem == $request->mensagem ? $msgDuplicada = true : SiteContato::create($request->all());
            
        } else {
            SiteContato::create($request->all());
        }
        
        $contatos = SiteContato::where('email', $request->email)
                        ->where('mensagem', $request->mensagem)
                        ->get();
        //O código abaixo redireciona para página contato
        //se a mensagem for registrada no banco de dados com sucesso
        //aparecerá Mensagem enviada com sucesso
        //caso o contrário aparecerá Não foi possível enviar sua mensagem
        if(!empty($contatos && $msgDuplicada == false)) {
            return redirect('contato?status=0');
        } else {
            return redirect('contato?status=1');
        }
    }
}
