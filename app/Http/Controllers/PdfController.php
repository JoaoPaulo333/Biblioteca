<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function index()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        $d = DB::select('SELECT l.id,l.titulo,l.isbn,l.edicao,l.editora,l.ano,a.nome as autor,c.nome as categoria, count(e.id)as exemplares from livro l inner join autor a on l.Autor_id = a.id inner join categoria c on l.Categoria_id = c.id inner join exemplar e on e.Livro_id = l.id group by (l.id);');
        error_reporting(0);
        $html = "</table>";
        $html .= "<table name='tbl'>";
        $html .= " <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>ISBN</th>
                                    <th>Edicao</th>
                                    <th>Editora</th>
                                    <th>Ano</th>
                                    <th>Autor</th>
                                    <th>Categoria</th>
                                    <th>Exemplares</th>
                                </tr>
                                </thead>";
        foreach ($d as $livro):
            $html .= " <tr>
                                        <td>{$livro->id}</td>
                                        <td>{$livro->titulo}</td>
                                        <td>{$livro->isbn}</td>
                                        <td>{$livro->edicao}</td>
                                        <td>{$livro->editora}</td>
                                        <td>{$livro->ano}</td>
                                        <td>{$livro->autor}</td>
                                        <td>{$livro->categoria}</td>
                                        <td>{$livro->exemplares}</td>
                                    </tr>";
        endforeach;
        $html .= "</table>";

        $mpdf = new Mpdf();
        $mpdf->SetCreator('PDF_CREATOR');
        $mpdf->SetAuthor('Joao Paulo');
        $mpdf->SetTitle('Relatorio de Todos os livros e numero de exemplares');
        $mpdf->SetSubject('Biblioteca');
        $mpdf->SetKeywords('TCPDF, ECA');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->nbpgPrefix = ' de ';
        $mpdf->setFooter("Relatório gerado");
//        dd($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output('biblioteca.pdf', 'I');


        return view('relatorios.index');
    }

    public function index2()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        $d = DB::select('select e.id, e.dataIda, e.devolvido,e.dataVolta,u.name,l.titulo from emprestimo e inner join users u on e.Usuario_id = u.id inner join exemplar ex on e.Exemplar_id = ex.id inner join livro l on ex.Livro_id = l.id ;');
        error_reporting(0);
        $html = "</table>";
        $html .= "<table name='tbl'>";
        $html .= " <thead >
                                <tr>
            <th>ID</th>
            <th>Data Ida</th>
            <th>Data Volta</th>
            <th>Devolvido</th>
            <th>Usuario</th>
            <th>Livro</th>
                    </tr>
                                </thead>";
        foreach ($d as $emp):
            $html .= "<tr>
                 <td>{$emp->id}</td>
                <td>{$emp->dataIda}</td>
                <td>{$emp->dataVolta}</td>
                <td>{$emp->devolvido}</td>
                <td>{$emp->name}</td>
                <td>{$emp->titulo}</td>
                </tr>";
        endforeach;
        $html .= "</table>";

        $mpdf = new Mpdf();
        $mpdf->SetCreator('PDF_CREATOR');
        $mpdf->SetAuthor('Joao Paulo');
        $mpdf->SetTitle('Relatorio de Todos os livros Emprestados');
        $mpdf->SetSubject('Biblioteca');
        $mpdf->SetKeywords('TCPDF, ECA');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->nbpgPrefix = ' de ';
        $mpdf->setFooter("Relatório gerado");
//        dd($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output('biblioteca.pdf', 'I');


        return view('relatorios.index');
    }

    public function index3()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        $d = DB::select('select r.id, r.data, r.correspondido ,l.titulo, u.name from reserva r inner join livro l on r.Livro_id = l.id inner join users u on r.Usuario_id = u.id ;');
        error_reporting(0);
        $html = "</table>";
        $html .= "<table name='tbl'>";
        $html .= " <thead >
                                <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Correspondido</th>
            <th>Titulo</th>
            <th>Usuario</th>
                    </tr>
                                </thead>";
        foreach ($d as $res):
            $html .= "<tr>
                 <td>{$res->id}</td>
                <td>{$res->data}</td>
                <td>{$res->correspondido}</td>
                <td>{$res->titulo}</td>
                <td>{$res->name}</td>
                </tr>";
        endforeach;
        $html .= "</table>";

        $mpdf = new Mpdf();
        $mpdf->SetCreator('PDF_CREATOR');
        $mpdf->SetAuthor('Joao Paulo');
        $mpdf->SetTitle('Relatorio de Todos os livros Reservados');
        $mpdf->SetSubject('Biblioteca');
        $mpdf->SetKeywords('TCPDF, ECA');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->nbpgPrefix = ' de ';
        $mpdf->setFooter("Relatório gerado");
//        dd($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output('biblioteca.pdf', 'I');


        return view('relatorios.index');
    }

    public function index4()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        $d = DB::select('select * from users  ;');
        error_reporting(0);
        $html = "</table>";
        $html .= "<table name='tbl'>";
        $html .= " <thead >
                                <tr>
            
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Password</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>Punicao</th>
                <th>Data Punicao</th>
                    </tr>
                                </thead>";
        foreach ($d as $user):
            $html .= "<tr>
                 
                <td>{$user->id}</td>
                <td>{$user->name}</td>
                <td>{$user->email}</td>
                <td>{$user->password}</td>
                <td>{$user->cpf}</td>
                <td>{$user->telefone}</td>
                <td>{$user->tipo}</td>
                <td>{$user->punicao}</td>
                <td>{$user->dataPunicao}</td>
                </tr>";
        endforeach;
        $html .= "</table>";

        $mpdf = new Mpdf();
        $mpdf->SetCreator('PDF_CREATOR');
        $mpdf->SetAuthor('Joao Paulo');
        $mpdf->SetTitle('Relatorio de Usuarios');
        $mpdf->SetSubject('Biblioteca');
        $mpdf->SetKeywords('TCPDF, ECA');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->nbpgPrefix = ' de ';
        $mpdf->setFooter("Relatório gerado");
//        dd($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output('biblioteca.pdf', 'I');


        return view('relatorios.index');
    }
    public function index5()
    {
        //pega o tipo do usuario e manda para a pagina com compact
//        dd($user = auth()->user()->tipo);

        $d = DB::select('select e.id, e.dataIda, e.devolvido,e.dataVolta,u.name,l.titulo from emprestimo e inner join users u on e.Usuario_id = u.id inner join exemplar ex on e.Exemplar_id = ex.id inner join livro l on ex.Livro_id = l.id where e.dataVolta < current_date() and devolvido = 0;');
        error_reporting(0);
        $html = "</table>";
        $html .= "<table name='tbl'>";
        $html .= " <thead >
                                <tr>
            
                <th>ID</th>
            <th>Data Ida</th>
            <th>Data Volta</th>
            <th>Devolvido</th>
            <th>Usuario</th>
            <th>Livro</th>
                    </tr>
                                </thead>";
        foreach ($d as $emp):
            $html .= "<tr>
                 
                 <td>{$emp->id}</td>
                <td>{$emp->dataIda}</td>
                <td>{$emp->dataVolta}</td>
                <td>{$emp->devolvido}</td>
                <td>{$emp->name}</td>
                <td>{$emp->titulo}</td>
                </tr>";
        endforeach;
        $html .= "</table>";

        $mpdf = new Mpdf();
        $mpdf->SetCreator('PDF_CREATOR');
        $mpdf->SetAuthor('Joao Paulo');
        $mpdf->SetTitle('Relatorio de Livros atrasados');
        $mpdf->SetSubject('Biblioteca');
        $mpdf->SetKeywords('TCPDF, ECA');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->nbpgPrefix = ' de ';
        $mpdf->setFooter("Relatório gerado");
//        dd($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output('biblioteca.pdf', 'I');


        return view('relatorios.index');
    }
}
