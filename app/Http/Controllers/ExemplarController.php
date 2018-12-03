<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exemplar;

use Illuminate\Support\Facades\DB;

class ExemplarController extends Controller
{
    private $exemplar;

    /**
     * ExemplarController constructor.
     * @param $exemplar
     */
    public function __construct(Exemplar $exemplar)
    {
        $this->exemplar = $exemplar;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exemplares = DB::select('select e.id ,e.arquivo,e.disponivel,l.titulo from exemplar e inner join livro l on e.Livro_id = l.id');

        return view('exemplars.index',compact('exemplares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livros = DB::select('select * from livro');

        return view('exemplars.cad',compact('livros'));
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

        $this->validate($request, $this->exemplar->rules);

        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){

            $name = $dados['Livro_id'];

            $estencao = $request->arquivo->extension();

            $nomeArq = "{$name}.{$estencao}";

            $dados['arquivo'] = $nomeArq;

            $request->arquivo->storeAs('arquivos',$nomeArq);
        }

        $insert = $this->exemplar->create($dados);

        if($insert)
            return redirect()->route('exemplars.index');
        else
            return redirect()->route('exemplars.create');
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

        $exemplar= $this->exemplar->find($id);

        return view('exemplars.exibir',compact('exemplar'));
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

        $this->validate($request, $this->exemplar->rules);

        $exemplar = $this->exemplar->find($id);

        $update = $exemplar->update($dados);

        if($update)
            return redirect()->route('exemplars.index');
        else
            return redirect()->route('exemplars.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exemplar = $this->exemplar->find($id);

        $delete = $exemplar->delete();

        if($delete)
            return redirect()->route('exemplars.index');
    }
}
