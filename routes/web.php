<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*------------------------Tipos de redirecionamento------------------------------------------
 * Forma direta
 * Route::redirect('<origem>','<destino>')
 * 
 * Podemos também utilizar dentro dos controllers(forma mais comum)
 * Dentro dos controladores fazemos de forma análoga ao callback
 * Chamar a rota desejada dentro da função de callback
 * Exemplo: Route::get('<origem>', function(){
 *       return redirect()->route('<destino>');
 * });
 * ---------------------------------------------------------------------------------------------
 * Rota de fallback (rota de contingência)
 * Route::fallback(function(){
 *      echo 'A página desejada não existe. <a href="'.route('site.index').'">Clique aqui</a> para retornar a página inicial';
 * });
 */
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');;

Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')
    ->prefix('/app')
    ->group(function (){
        Route::get('/home', [HomeController::class, 'index'])
            ->name('app.home');
        Route::get('/sair', [LoginController::class, 'sair'])
            ->name('app.sair');
        Route::get('/cliente', [ClienteController::class, 'index'])
            ->name('app.cliente');
        Route::get('/produto', [ProdutoController::class, 'index'])
            ->name('app.produto');
        Route::get('/fornecedor', [FornecedorController::class, 'index'])
            ->name('app.fornecedor');
    }
);
