<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{

    private $autor;

    /**
     * AutorController constructor.
     * @param $autor
     */
    public function __construct(Autor $autor)
    {
        $this->autor = $autor;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autors = $this->autor->all();
        $user = auth()->user()->tipo;

        return view('autors.index',compact('autors','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autors.cad');
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

        $this->validate($request, $this->autor->rules);

        $insert = $this->autor->create($dados);

        if($insert)
            return redirect()->route('autors.index');
        else
            return redirect()->route('autors.create');
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

        $autor = $this->autor->find($id);


        return view('autors.cad',compact('autor'));
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

        $this->validate($request, $this->autor->rules);

        $autor = $this->autor->find($id);

        $update = $autor->update($dados);

        if($update)
            return redirect()->route('autors.index');
        else
            return redirect()->route('autors.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = $this->autor->find($id);

        $delete = $autor->delete();

        if($delete)
            return redirect()->route('autors.index');
    }
}
