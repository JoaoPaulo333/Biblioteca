<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;
use phpDocumentor\Reflection\Types\Compound;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->tipo;
        //select u.id , u.nome, e.id, e.arquivo, l.titulo from users u inner join emprestimo em on em.Usuario_id = u.id inner join exemplar e on em.Exemplar_id = e.id inner join livro l on e.Livro_id = l.id

        return view('home',compact('user'));
    }
}
