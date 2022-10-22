<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');;

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');

Route::get('/login', function() { return 'Login';})->name('site.login');

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\Teste@teste')->name('site.teste');

Route::prefix('/app')->group(function (){
    Route::get('/clientes', function() { return 'Clientes';})->name('app.clientes');
    Route::get('/produtos', function() { return 'Produtos';})->name('app.produtos');
    Route::get('/fornecedores', 'App\Http\Controllers\FornecedorController@index');
});
