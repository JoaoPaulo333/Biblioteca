@extends('layouts.app')
@section('title')
    Lista Livros
@stop


@section('content')
    <h1>Listagem de Livros</h1>

    <a href="{{Route('livros.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbLivros" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Titulo</th>
            <th>ISBN</th>
            <th>Edicao</th>
            <th>Editora</th>
            <th>Ano</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($livros as $livro)
            <tr>
                <td>{{$livro->titulo}}</td>
                <td>{{$livro->isbn}}</td>
                <td>{{$livro->edicao}}</td>
                <td>{{$livro->editora}}</td>
                <td>{{$livro->ano}}</td>
                <td>{{$livro->autor}}</td>
                <td>{{$livro->categoria}}</td>
                <td>
                    <a href="{{Route('livros.edit',$livro->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="{!! url('livros/destroy/'.$livro->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop