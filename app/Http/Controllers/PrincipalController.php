<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //
    public function principal() {
        //echo 'Olá, seja bem-vindo';
        return view('site.principal', ['title' => 'Home']);
    }
}
