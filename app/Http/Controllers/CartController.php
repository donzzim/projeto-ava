<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Binafy\LaravelCart\Models\Cart;
use App\Models\Produto;
use Binafy\LaravelCart\Models\CartItem;

class CartController extends Controller
{
    public int $userId = 20; // Simulando um usuário autenticado com ID 20

    public function cartList()
    {
        $cart = Cart::where('user_id', $this->userId)->first();

        $produtos = $cart ? $cart->items : collect();

        return view('cart.index', compact('produtos'));
        // return dd($produtos);
    }

    public function addToCart(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);

        $cart = Cart::firstOrCreate(['user_id' => $this->userId]);

        $cart->storeItem($produto);

        flash()->option('title', 'Sucesso!')->success('Produto adicionado ao carrinho!');
            
        return redirect()->route('cart.list');
    }

    public function removeItem($productId)
    {
        $cart = Cart::query()->firstOrCreate([
            'user_id' => $this->userId
        ]);

        $product = Produto::findOrFail($productId);

        $cart->removeItem($product);

        return redirect()
            ->route('cart.list')
            ->with('success', 'Item removido do carrinho!');
    }

    public function finish()
    {
        $cart = Cart::query()->firstOrCreate(['user_id' => $this->userId]);

        if ($cart) {
            $cart->emptyCart();
        }

        return redirect()
            ->route('cart.list')
            ->with('success', 'Compra finalizada com sucesso!');
    }

    public function freshCart(Request $request)
    {
        $cart = Cart::query()->firstOrCreate(['user_id' => $this->userId]);

        if ($cart) {
            $cart->emptyCart();
        }

        return redirect()
            ->route('cart.list')
            ->with('info', 'Carrinho esvaziado!');
    }

}
