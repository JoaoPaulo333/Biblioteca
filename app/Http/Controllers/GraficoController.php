<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;
use PHPlot;

use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function index()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        #Definimos os dados do gráfico
        $d = DB::select('select count(Month(dataIda)) as Dezembro from emprestimo where Month(dataIda) = 12 ;');
        $n = DB::select('select count(Month(dataIda)) as Novembro from emprestimo where Month(dataIda) = 11;');
        $o = DB::select('select count(Month(dataIda)) as Outubro from emprestimo where Month(dataIda) = 10;');




        $dados = array(
            array('Outubro', $o[0]->Outubro),
            array('Novembro', $n[0]->Novembro),
            array('Dezembro', $d[0]->Dezembro),
        );


        $gra1 = new PHPlot('600','400');
        $gra1->SetTitle('Emprestimos nos ultimos 3 meses');
        $gra1->SetDataValues($dados);
        $gra1->SetPlotType('bars');
        $gra1->SetFileFormat("png");
        $gra1->DrawGraph();


        return view('graficos.grafico1');
    }

    public function show()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        #Definimos os dados do gráfico
        $d = DB::select('select count(Month(data)) as Dezembro from reserva where Month(data) = 12 ;');
        $n = DB::select('select count(Month(data)) as Novembro from reserva where Month(data) = 11;');
        $o = DB::select('select count(Month(data)) as Outubro from reserva where Month(data) = 10;');




        $dados = array(
            array('Outubro', $o[0]->Outubro),
            array('Novembro', $n[0]->Novembro),
            array('Dezembro', $d[0]->Dezembro),
        );


        $gra1 = new PHPlot('600','400');
        $gra1->SetTitle('Reservas nos ultimos 3 meses');
        $gra1->SetDataValues($dados);
        $gra1->SetPlotType('linepoints');
        $gra1->SetFileFormat("png");
        $gra1->DrawGraph();


        return view('graficos.grafico1');
    }

    public function graf()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        #Definimos os dados do gráfico
        $dd = DB::select('select c.nome, count(Month(r.data)) as Dezembro from Reserva  r inner join livro l on r.Livro_id = l.id inner join categoria c on l.Categoria_id = c.id where Month(data) between 10 and 12 group by c.nome;');


        foreach ($dd as $value) {
            $dados[] = $value;

        }


        if (isset($dados)) {
            foreach ($dados as $r) {
                $data[] = [$r->nome,$r->Dezembro];
            }
        } else {
            $data[] = [null, null];
        }



        $gra1 = new PHPlot('600','400');
        $gra1->SetTitle(' Reservas ultimos 3 meses por Categoria');
        $gra1->SetDataValues($data);
        $gra1->SetPlotType('thinbarline');
        $gra1->SetFileFormat("png");
        $gra1->DrawGraph();


        return view('graficos.grafico1');
    }

    public function graf1()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        #Definimos os dados do gráfico
        $dd = DB::select('select c.nome, count(Month(e.dataIda)) as Dezembro from emprestimo  e inner join exemplar ex on e.Exemplar_id = ex.id inner join livro l on ex.Livro_id = l.id inner join categoria c on l.Categoria_id = c.id where Month(e.dataIda) between 10 and 12 group by c.nome;');


        foreach ($dd as $value) {
            $dados[] = $value;

        }


        if (isset($dados)) {
            foreach ($dados as $r) {
                $data[] = [$r->nome,$r->Dezembro];
            }
        } else {
            $data[] = [null, null];
        }



        $gra1 = new PHPlot('600','400');
        $gra1->SetTitle(' Emprestimos ultimos 3 meses por Categoria');
        $gra1->SetDataValues($data);
        $gra1->SetPlotType('bars');
        $gra1->SetFileFormat("png");
        $gra1->DrawGraph();


        return view('graficos.grafico1');
    }
    public function graf2()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        #Definimos os dados do gráfico
        $d = DB::select('select count(Month(dataIda)) as qua from emprestimo where Month(dataIda) = 12 ;');
        $dd = DB::select('select count(Month(data)) as quant from reserva where Month(data) = 12 ;');


        $da= array(
        array('Quantidade',$d[0]->qua + $dd[0]->quant),
    );


        $gra1 = new PHPlot('600','400');
        $gra1->SetTitle(' Total de livros emprestados ');
        $gra1->SetDataValues($da);
        $gra1->SetPlotType('bars');
        $gra1->SetFileFormat("png");
        $gra1->DrawGraph();


        return view('graficos.grafico1');
    }
}
