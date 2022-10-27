<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    //
    public function principal() {
        //echo 'Olá, seja bem-vindo';
        
        $motivos_contato = MotivoContato::all();

        return view('site.principal', 
            ['title' => 'Home', 
            'motivos_contato' => $motivos_contato]
        );
    }
}
