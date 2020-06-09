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

Route::get('/', function () {
    return view('welcome');
});

Route::any('any', function () {
    return 'Any';
});

Route::get('/teste', function () {
    return view('site.teste');
});

Route::post('/register', function (){
    return 'Errado';
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

// Nome não precisa ser igual ao passar parâmetro
Route::get('/categorias/{flag}',  function ($test) {
    return "Categoria retornada: {$test}";
});

// Nome do argumento da função deve ser condizente com o do pârametro da url
Route::get('/categoria/{flag}/posts',  function ($flag) {
    return "Post retornado: {$flag}";
});

// A interrogação especifica que 
Route::get('/produto/{idProduto?}', function ($idProduto = '') {
    return "Produto(s) {$idProduto}";
});

// Route::get('redirect1', function () {
//     return redirect('/redirect2');
// });

Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function () {
    return 'Página redirecionada com sucesso!!';
});

Route::get('/redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/pablo', function () {
    return 'hey hey hey';
})->name('url.name');

// Route::get('/admin/dashboard', function () {
//     return 'Home Admin';
// })->middleware('auth');

Route::get('/login', function () {
    return 'Autenticação necessária para se conectar à rota administrativa';
})->name('login');


// Rotas por grupo
// Route::middleware(['auth'])->group(function () {
//     // Prefixo para facilitar caso necessite de troca
//     Route::prefix('meuteste')->group(function(){
//         Route::get('/dashboard', function () {
//             return 'Olá test';
//         });

//         Route::get('/', 'Admin\TestController@test');
//     });
// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function() {

});