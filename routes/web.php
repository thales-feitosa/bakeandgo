<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
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


Route::get('/produtos', 'PaginaProdutos@index');

Route::get('/erro', function() {
    return view('erro');
});

Route::get('/quem-somos', function() {
    return view('quem-somos');
});

/*
|--------------------------------------------------------------------------
| CONTROLLERS - NAVEGAÇÃO DO SITE
|--------------------------------------------------------------------------
*/

Route::get('/', 'NavigateController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');


// ACESSO DE USÁRIOS
Route::get('/user/minha-conta', 'NavigateController@minhaConta')->name('user.minha-conta')->middleware('auth');
Route::put('/user/minha-conta/{id}', 'NavigateController@update')->name('user.update');
Route::get('/user/meus-pedidos', 'NavigateController@meusPedidos')->name('user.meus-pedidos');

// ACESSO AS PÁGINAS DE USUÁRIO - LOGIN E LOGOUT
Route::get('/user', 'NavigateController@loginForm')->name('user');
Route::get('/user/login', 'NavigateController@loginDirect')->name('user.login');
Route::post('/user/login/do', 'NavigateController@login')->name('user.login.do');
Route::get('/user/logout', 'NavigateController@logoutUser')->name('user.logout');

Auth::routes();


/*
|--------------------------------------------------------------------------
| CESTA DE COMPRAS
|--------------------------------------------------------------------------
*/

Route::get('/cesta-compras','CestaComprasController@index')->name('cesta-compras');
Route::get('/cesta-compras/adicionar', function(){
    return redirect()->route('index');
});
Route::post('/cesta-compras/adicionar', 'CestaComprasController@adicionar')->name('cesta-compras.adicionar');
Route::delete('/cesta-compras/remover','CestaComprasController@remover')->name('cesta-compras.remover');
Route::get('converterPedido', 'CestaComprasController@converterPedido')->name('converter.pedido');
Route::get('finalizarCompra', 'CestaComprasController@compras')->name('pagina.finalizar');
Route::post('compraFinalizada', 'CestaComprasController@concluir')->name('pedido.concluido');


/*
|--------------------------------------------------------------------------
| ACESSO ADMINISTRATIVO
|--------------------------------------------------------------------------
*/

// ACESSO AS PÁGINAS ADMINISTRATIVAS - LOGIN E LOGOUT
Route::get('/admin', 'AuthController@manager')->name('admin');
Route::get('/admin/login', 'AuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');
Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
// TORNAR USUÁRIO ADMINISTRADOR
Route::put('/admin/toggleAdmin/{id}', 'AuthController@toggleAdmin');


/*
|--------------------------------------------------------------------------
| ACESSO DO USUÁRIO
|--------------------------------------------------------------------------
*/

// CADASTRO DE USUÁRIOS
Route::get('/cadastro', 'UsersController@createPage')->name('cadastro');
Route::post('/cadastro', 'UsersController@createUser');
Route::get('/admin/adm-usuario', 'UsersController@listAllUsers')->name('adm-usuario');
// Route::get('/user/editar-usuario/{id}', 'UsersController@editUser');
// Route::put('/user/editar-usuario/{id}', 'UsersController@updateUser');
Route::delete('/admin/adm-usuario/{id}', 'UsersController@deleteUser');


/*
|--------------------------------------------------------------------------
| CATEGORIAS
|--------------------------------------------------------------------------
*/

Route::get('/admin/adm-categoria', 'CategoriasController@tabela')->name('adm-categoria');
Route::post('/admin/adm-categoria', 'CategoriasController@create');
Route::put('/admin/adm-categoria/{id}', 'CategoriasController@update');
Route::delete('/admin/adm-categoria/{id}', 'CategoriasController@delete');


/*
|--------------------------------------------------------------------------
| PRODUTOS
|--------------------------------------------------------------------------
*/

Route::get('/admin/adm-produto', 'ProdutosController@tabela')->name('adm-produto');
Route::post('/admin/adm-produto', 'ProdutosController@create');
Route::put('/admin/adm-produto/{id}', 'ProdutosController@update');
Route::delete('/admin/adm-produto/{id}', 'ProdutosController@delete');


/*
|--------------------------------------------------------------------------
| MENSAGENS
|--------------------------------------------------------------------------
*/

Route::get('/admin/adm-mensagem', 'MensagemController@listMessage')->name('mensagens.listAll');
Route::get('/contato', 'MensagemController@pagContato');
Route::post('/contato', 'MensagemController@sendMessage')->name('contato');
Route::delete('/admin/removeMessage/{id}', 'MensagemController@deleteMessage');

// HISTORICO DE PEDIDOS
Route::get('/admin/adm-historico-pedidos', function () {
    return view('admin/adm-historico-pedidos');
});
