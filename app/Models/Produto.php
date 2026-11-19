<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'preco',
        'quantidade',
    ];

    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
            'quantidade' => 'integer',
        ];
    }
}
