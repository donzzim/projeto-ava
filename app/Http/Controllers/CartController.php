<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $items = Cart::all(); 
        return view ('cart.index', ['items' => $items ?? [
            'name' => 'Carrinho Vazio',
            'price' => '0.00'
        ]]);
    }
}
