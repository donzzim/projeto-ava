<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function categoria($id)
    {
        $categoria = \App\Models\Categoria::find($id);
        $produtos = \App\Models\Produto::where('categoria_id', $id)->paginate(3);
        return view('categorias.show', compact('produtos', 'categoria'));
    }
}
