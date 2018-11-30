<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Livro;

class LivroController extends Controller
{
    private $livro;

    /**
     * LivroController constructor.
     * @param $livro
     */
    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = DB::select('SELECT l.id,l.titulo,l.isbn,l.edicao,l.editora,l.ano,a.nome as autor,c.nome as categoria from livro l inner join autor a on l.Autor_id = a.id inner join categoria c on l.Categoria_id = c.id');

        return view('livros.index',compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = DB::select('select * from autor');

        $categorias = DB::select('select * from categoria');

        return view('livros.cad',compact('autores','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $this->validate($request, $this->livro->rules);

        $insert = $this->livro->create($dados);

        if($insert)
            return redirect()->route('livros.index');
        else
            return redirect()->route('livros.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
