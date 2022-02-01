<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id','comprimento', 'largura', 'altura', 'unidade_id'];

    protected $hidden = [];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
