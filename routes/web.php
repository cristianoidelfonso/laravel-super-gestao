<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PrincipalController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(App\Http\Middleware\LogAcessoMiddleware::class)
//     ->get('/', [App\Http\Controllers\PrincipalController::class,'index'])->name('site.index');
// Route::middleware(App\Http\Middleware\LogAcessoMiddleware::class)
//     ->get('/contato', [App\Http\Controllers\ContatoController::class,'index'])->name('site.contato');


Route::get('/', [App\Http\Controllers\PrincipalController::class,'index'])->name('site.index');

Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class,'index'])->name('site.sobrenos');

Route::get('/contato', [App\Http\Controllers\ContatoController::class,'index'])->name('site.contato');

Route::post('/contato', [App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');



Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');



Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    // Produtos
    Route::resource('produto', App\Http\Controllers\ProdutoController::class);
    // Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');

    Route::resource('produto-detalhe', App\Http\Controllers\ProdutoDetalheController::class);

    // Clientes
    Route::resource('cliente', App\Http\Controllers\ClienteController::class);

    Route::resource('pedido', App\Http\Controllers\PedidoController::class);

    // Route::resource('pedido-produto', App\Http\Controllers\PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    // Route::delete('pedido-produto/destroy/{pedido}/{produto}', [App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', [App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');

    // Fornecedores
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

});


// Route::get('/teste/{p1}/{p2}',[App\Http\Controllers\TesteController::class, 'teste'])->name('teste');


// Route::fallback(function(){
    // return 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para a página principal!';
// });
