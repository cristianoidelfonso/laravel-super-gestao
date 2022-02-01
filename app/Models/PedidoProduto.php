<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoProduto extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;

    protected $table = 'pedido_produtos';

    protected $fillable = [];

    protected $hidden = [];
}
