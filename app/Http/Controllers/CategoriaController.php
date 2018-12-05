<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    private $categoria;

    /**
     * CategoriaController constructor.
     * @param $categoria
     */
    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categoria->all();
        $user = auth()->user()->tipo;

        return view('categorias.index',compact('categorias','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.cad');
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

        $this->validate($request, $this->categoria->rules);

        $insert = $this->categoria->create($dados);

        if($insert)
            return redirect()->route('categorias.index');
        else
            return redirect()->route('categorias.create');
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
        $categoria = $this->categoria->find($id);

        return view('categorias.cad',compact('categoria'));
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

        $dados = $request->all();

        $this->validate($request, $this->categoria->rules);

        $categoria = $this->categoria->find($id);

        $update = $categoria->update($dados);

        if($update)
            return redirect()->route('categorias.index');
        else
            return redirect()->route('categorias.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoria->find($id);

        $delete = $categoria->delete();

        if($delete)
            return redirect()->route('categorias.index');
    }
}
