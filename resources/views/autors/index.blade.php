@extends('layouts.app')
@section('title')
    Lista Autores
@stop


@section('content')
    @if ($user == 'Funcionario' || $user == 'Bibliotecario')
    <h1>Listagem de Autores</h1>

    <a href="{{Route('autors.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbAutors" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Nome</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($autors as $autor)
            <tr>
                <td>{{$autor->nome}}</td>
                <td>
                    <a href="{{Route('autors.edit',$autor->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="{!! url('autors/destroy/'.$autor->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
@stop