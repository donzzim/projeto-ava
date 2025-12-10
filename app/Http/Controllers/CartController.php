<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;
use App\Models\Produto;
use Binafy\LaravelCart\Models\CartItem;

class CartController extends Controller
{
    public function cartList()
    {
        $cart = Cart::where('user_id', 20)->first();

        $produtos = $cart ? $cart->items : collect();

        return view('cart.index', compact('produtos'));
    }

    public function addToCart(Request $request, $userId)
    {
        $produto = Produto::findOrFail($request->produto_id);

        $cart = Cart::firstOrCreate(['user_id' => $userId ?? 20]);

        $cart->storeItem($produto);

        return redirect()
            ->route('cart.list')
            ->with('success', 'Produto adicionado!', 'Sucesso');
    }
}
