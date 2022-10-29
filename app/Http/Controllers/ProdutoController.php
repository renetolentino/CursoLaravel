<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //método chamado ao acessar a rota app/produto
    public function index() {
        return view('app.produto');
    }
}
