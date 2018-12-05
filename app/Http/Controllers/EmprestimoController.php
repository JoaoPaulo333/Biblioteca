<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    private $emprestimo;

    /**
     * EmprestimoController constructor.
     * @param $emprestimo
     */
    public function __construct(Emprestimo $emprestimo)
    {
        $this->emprestimo = $emprestimo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimos = DB::select('select e.id, e.dataIda, e.devolvido,e.dataVolta,u.name,l.titulo from emprestimo e inner join users u on e.Usuario_id = u.id inner join exemplar ex on e.Exemplar_id = ex.id inner join livro l on ex.Livro_id = l.id where e.devolvido = 0;');


        return view('emprestimos.index', compact('emprestimos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = DB::select('select * from users');

        $exemplars = DB::select('SELECT * FROM exemplar e inner join livro l on e.Livro_id = l.id where e.disponivel = 1;');

        return view('emprestimos.cad', compact('usuarios', 'exemplars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
//tem que validar casos aqui e no edit e excluir e em ambos validar o usuario
//        $this->validate($request, $this->emprestimo->rules);
        $tipo = DB::select('select * from users where id =' . $dados['Usuario_id']);

        $tipo = $tipo[0];
        if ($tipo) {
            $punido = DB::select('select punicao from users where id =' . $tipo->id);
            if ($punido[0]->punicao == 1)
                return 'Este usuario esta Punido e nao pode pegar livros';
            else
                if ($tipo->tipo == 'Aluno' || $tipo->tipo == 'Funcionario') {
                    $quantidade = DB::select('SELECT count(Usuario_id) as cont from emprestimo where Usuario_id =' . $tipo->id);
                    if ($quantidade[0]->cont >= 3)
                        return 'O Este usuario ja esta de posse de seu limite de emprestimos';
                    else
                        $reservado = DB::select('SELECT r.id from  reserva r inner join livro l on r.Livro_id =l.id inner join exemplar e on e.Livro_id = l.id where r.Usuario_id = ' . $tipo->id . ' and e.id =' . $dados['Exemplar_id']);
                    if ($reservado)
                        DB::update('update reserva set correspondido = 1 where id =' . $reservado[0]->id);


                    $data = date('Y-m-d', strtotime('+10 days'));
                    $dados['dataVolta'] = $data;
                }
            $dataHj = date('Y-m-d');
            $dados['dataIda'] = $dataHj;
            DB::update('update exemplar set disponivel = 0 where id = ' . $dados['Exemplar_id'] ." and arquivo = null");
            $insert = $this->emprestimo->create($dados);


            if ($insert)
                return redirect()->route('emprestimos.index');
            else
                return redirect()->route('emprestimos.create');
        } else
            return redirect()->route('emprestimos.index', imap_alerts('Erro'));


//
//
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $emprestimo = $this->emprestimo->find($id);


        $usuarios = DB::select('select * from users');

        $exemplars = DB::select('SELECT * FROM exemplar e inner join livro l on e.Livro_id = l.id where e.disponivel = 1;');


        return view('emprestimos.cad', compact('emprestimo', 'usuarios', 'exemplars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();

        $this->validate($request, $this->emprestimo->rules);

        $emprestimo = $this->emprestimo->find($id);

        $update = $emprestimo->update($dados);

        if ($update)
            return redirect()->route('emprestimos.index');
        else
            return redirect()->route('emprestimos.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $emprestimo = $this->emprestimo->find($id);

        $delete = $emprestimo->delete();

        if ($delete)
            return redirect()->route('emprestimos.index');
    }
}
