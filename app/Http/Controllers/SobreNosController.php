<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{

    public function __construct()
    {
        // Utilizando a importação direta da classe
        // $this->middleware(LogAcessoMiddleware::class);

        // Utilizando o apelido do middleware registrado no arquivo App\Http\Kernel.php->protected $routeMiddleware
        $this->middleware('log.acesso');
    }

    public function index()
    {
        return view('site.sobre-nos');
    }
}
