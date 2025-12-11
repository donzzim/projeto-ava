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
        // return dd($produtos);
    }

    public function addToCart(Request $request)
    {

        $userId = 20; // Simulando um usuário autenticado com ID 20

        $produto = Produto::findOrFail($request->produto_id);

        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cart->storeItem($produto);

        return redirect()
            ->route('cart.list')
            ->with('success', 'Produto adicionado!', 'Sucesso');

    }

    public function removeItem($productId)
    {
        $userId = 20;

        $cart = Cart::query()->firstOrCreate([
            'user_id' => $userId
        ]);

        $product = Produto::findOrFail($productId);

        $cart->removeItem($product);

        return redirect()
            ->route('cart.list')
            ->with('success', 'Item removido do carrinho!');
    }

    public function finish()
    {
        $userId = 20;

        $cart = Cart::query()->firstOrCreate(['user_id' => $userId]);

        if ($cart) {
            $cart->emptyCart();
        }

        return redirect()
            ->route('cart.list')
            ->with('success', 'Compra finalizada com sucesso!');
    }

}
