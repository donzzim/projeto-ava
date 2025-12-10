<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::paginate(6);
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('produtos.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação opcional (recomendado)
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required',
            'user_id' => 'required|exists:users,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $preco = str_replace(',', '.', $request->preco);

        $produto = Produto::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'preco' => $preco,
            'slug' => \Str::slug($request->input('nome')),
            'user_id' => $request->input('user_id'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        if($produto){
            flash()
                ->option('title', 'Produto Armazenado com Sucesso!')
                ->success('Todas as informações do produto foram salvas!');
            return redirect()->route('produtos.index');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        return view('produtos.show', ['produto' => $produto]);
    }

    public function details($slug)
    {
        $produto = Produto::where('slug', $slug)->first();
        return dd($produto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Editar produto ' . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'Atualizar produto ' . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Deletar produto ' . $id;
    }
}
