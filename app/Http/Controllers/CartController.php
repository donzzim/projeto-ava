<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $items = Cart::items(); 
        return dd($items);
    }
}
