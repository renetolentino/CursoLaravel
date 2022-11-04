<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
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

Route::get('/cadastrar/{status?}', [LoginController::class, 'cadastrar'])->name('site.cadastrar');
Route::post('/cadastrar', [LoginController::class, 'salvarCadastro'])->name('site.cadastrar');

Route::middleware('autenticacao')
    ->prefix('/app')
    ->group(function (){

        Route::get('/home', [HomeController::class, 'index'])
            ->name('app.home');

        Route::get('/sair', [LoginController::class, 'sair'])
            ->name('app.sair');

        

        Route::get('/fornecedor', [FornecedorController::class, 'index'])
            ->name('app.fornecedor');
        Route::get('/fornecedor/adicionar/{status?}', [FornecedorController::class, 'adicionar'])
            ->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])
            ->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])
            ->name('app.fornecedor.listar');
        Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])
            ->name('app.fornecedor.listar');
        Route::get('/fornecedor/editar/{id}', [FornecedorController::class, 'editar'])
            ->name('app.fornecedor.editar');
        Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])
            ->name('app.fornecedor.excluir');

        //produtos
        Route::resource('produto', ProdutoController::class);

        //produto detalhes
        Route::resource('produto_detalhe', ProdutoDetalheController::class);

        //clientes
        Route::resource('cliente', ClienteController::class);

        //pedidos
        Route::resource('pedido', PedidoController::class);

        //Pedido Produto
        //Route::resource('pedido_produto', PedidoProdutoController::class);
        Route::get('pedido_produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido_produto.create');
        Route::post('pedido_produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido_produto.store');
        Route::delete('pedido_produto/{pedidoProduto}/{pedido_id}/destroy', [PedidoProdutoController::class, 'destroy'])->name('pedido_produto.destroy');
    }
);
