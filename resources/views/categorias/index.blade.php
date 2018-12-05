@extends('layouts.app')
@section('title')
    Lista Categorias
@stop


@section('content')
    <h1>Listagem de Categorias</h1>

    @if ($user == 'Funcionario' || $user == 'Bibliotecario')
    <a href="{{Route('categorias.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbCategorias" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Nome</th>
            <th>Assunto</th>
            <th>Descrição</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($categorias as $cat)
            <tr>
                <td>{{$cat->nome}}</td>
                <td>{{$cat->assunto}}</td>
                <td>{{$cat->descricao}}</td>
                <td>
                    <a href="{{Route('categorias.edit',$cat->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="{!! url('categorias/destroy/'.$cat->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
@stop