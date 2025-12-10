<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $items = Cart::all(); 
        dd($items);
    }

    public function addToCart(Request $request)
    {
        $item = Cart::add([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity', 1),
        ]);

        return response()->json(['message' => 'Item added to cart', 'item' => $item]);
    }
}
