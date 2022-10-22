<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'fornecedor' => 'Fornecedor 1',
                'status' => 'S',
                'cnpj' => '00.112.112/0001-39',
                'ddd' => '21',
                'telefone' => '00000-0000'
            ],
            1 => [
                'fornecedor' => 'Fornecedor 2',
                'status' => 'N',
                'cnpj' => '80.167.413/0001-02',
                'ddd' => '34',
                'telefone' => '00000-0000'
            ],

            2 => [
                'fornecedor' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '43.215.686/0001-40',
                'ddd' => '61',
                'telefone' => '00000-0000'
            ],

            3 => [
                'fornecedor' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '43.215.686/0001-40',
                'ddd' => '',
                'telefone' => '00000-0000'
            ],
        ];


        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
