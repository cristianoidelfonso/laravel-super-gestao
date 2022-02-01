<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function index()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.principal', compact('motivo_contatos'));
    }
}
