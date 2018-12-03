<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    private $reserva;

    /**
     * ReservaController constructor.
     * @param $reserva
     */
    public function __construct(Reserva $reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservas = DB::select('select r.id, r.data,l.titulo, u.name from reserva r inner join livro l on r.Livro_id = l.id inner join users u on r.Usuario_id = u.id');

        return view('reservas.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livros = DB::select('select * from livro');

        $users = DB::select('select * from users');

        return view('reservas.cad',compact('livros','users'));
        //
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

        $this->validate($request, $this->reserva->rules);

        $insert = $this->reserva->create($dados);

        if($insert)
            return redirect()->route('reservas.index');
        else
            return redirect()->route('reservas.create');
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
        $reserva = $this->reserva->find($id);


        $livros = DB::select('select * from livro');

        $users = DB::select('select * from users');

        return view('reservas.cad',compact('reserva','livros','users'));

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

        $this->validate($request, $this->reserva->rules);

        $reserva = $this->reserva->find($id);

        $update = $reserva->update($dados);

        if($update)
            return redirect()->route('reservas.index');
        else
            return redirect()->route('reservas.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $reserva = $this->reserva->find($id);

        $delete = $reserva->delete();

        if($delete)
            return redirect()->route('reservas.index');
    }
}
