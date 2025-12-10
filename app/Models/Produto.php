<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Binafy\LaravelCart\Cartable;
use App\Models\User;

class Produto extends Model implements Cartable
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'slug',
        'imagem',
        'user_id',
        'categoria_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function getPrice(): float
    {
        return $this->preco;
    }
}
