<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'site.home')->name('home');
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::view('config', 'site.config')->name('config');

    // Cria todas as rotas RESTful para produtos
    Route::resource('produtos', ProdutoController::class);
    Route::get('/produto/{slug}', [ProdutoController::class, 'details'])->name('produtos.details');

    Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('categorias.show');

    Route::resource('users', UserController::class);

    Route::prefix('cart')->name('cart.')->group(function () {

        Route::get('/', [CartController::class, 'cartList'])->name('list');

        Route::post('/', [CartController::class, 'addToCart'])->name('add');

        Route::delete('/{product}', [CartController::class, 'removeItem'])->name('remove');

        Route::post('/finish', [CartController::class, 'finish'])->name('finish');

        Route::post('/fresh', [CartController::class, 'freshCart'])->name('fresh');
    });

    // Route::view('/login', 'login.form')->name('login');

    // Route::post('/auth', [LoginController::class, 'auth'])->name('auth');

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // mover aqui as outras rotas que exigem usuário logado
    // Route::resource('produtos', ProdutoController::class);
    // Route::resource('categorias', CategoriaController::class);
        
    // Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produtos.show');
    // A interrogação após o id indica que o parâmetro é opcional
        
    // Route::get('/empresa', function () {
        //     return view('site.empresa');
    // });
        
        // Simplificação da rota acima utilizando o método view
        
    Route::any('/any', function () {
        return '<strong>Permite qualquer verbo HTTP (put, post, get, delete, etc).</strong>';
    });
    
    Route::match(['put', 'post'],'/match', function () {
        return 'Permite apenas acessos definidos.';
    });
    
    Route::get('/produto/{id}/{cat?}', function ($id, $cat = '') {
        return 'O ID do produto é: ' . $id . '<br> E a categoria é: ' . $cat ?? 'indefinida';
        // A interrogação após o cat indica que o parâmetro é opcional
    });
        
    // Route::get('/sobre', function () {
    //     return redirect('/empresa');
    // });
    
    // Simplificação da rota acima utilizando o método redirect
    
    // Route::redirect('/sobre', '/empresa');
    
    // Route::get('/todaynews', function () {
    //     return view('news');
    // })->name('noticias');
        
    // Route::get('/novidades', function () {
    //     return redirect()->route('noticias');
    // });
                
    // Route::group([
    //         'prefix' => 'admin', // Todas as rotas começam com admin/
    //         'as' => 'admin.' // Nome das rotas começam com admin.
    //     ], function () {
    //     Route::get('dashboard', function () {
    //         return 'Área de administração - Dashboard';
    //     })->name('dashboard');
    //     Route::get('users', function () {
    //         return 'Área de administração - Usuários';
    //     })->name('users');
    //     Route::get('clients', function () {
    //         return 'Área de administração - Clientes';
    //     })->name('clients');
    // });
});

