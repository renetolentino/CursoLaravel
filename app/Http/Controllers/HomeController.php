<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //método chamado ao acessar a rota app/home
    public function index() {
        return view('app.home');
    }
}
