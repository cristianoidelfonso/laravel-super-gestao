<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    use HasFactory;

    protected $table = 'motivo_contatos';

    protected $fillable = ['motivo_contato'];
}
