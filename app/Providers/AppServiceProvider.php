<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // AliasLoader::getInstance()->alias('Cart', \Binafy\LaravelCart\Facades\Cart::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $categoriasMenu = \App\Models\Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);
        // Agora a variável $categoriasMenu está disponível em todas as views
    }
} 
