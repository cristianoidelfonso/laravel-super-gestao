<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [];

    protected $hidden = [];

    public function produtos()
    {
        return $this->belongsToMany('App\Models\Produto', 'pedido_produtos')->withPivot('id','created_at');
    }

}
