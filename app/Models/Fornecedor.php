<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fornecedores';

    protected $fillable = ['nome','site', 'uf', 'email'];

    protected $hidden = [];

    public function produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
