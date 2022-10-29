<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //método utilizado ao acessar a rota app/cliente
    public function index() {
        return view('app.cliente');
    }
}
