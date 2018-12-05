@extends('layouts.app')
@section('title')
    Lista Exemplares
@stop


@section('content')
    <h1>Listagem de Exemplares</h1>

    @if ($user == 'Funcionario' || $user == 'Bibliotecario')
        <a href="{{Route('exemplars.create')}}" class="btn btn-success">Cadastrar</a>
    <table name="tbExemplares" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Disponivel</th>
            <th>Arquivo</th>
            <th>Livro</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($exemplares as $exemplar)
            <tr>
                <td>{{$exemplar->disponivel}}</td>
                <td>{{$exemplar->arquivo}}</td>
                <td>{{$exemplar->titulo}}</td>
                <td>
                    <a href="{{Route('exemplars.edit',$exemplar->id)}}" class="btn-group">
                        <span class="btn btn-primary">Exibir</span>
                    </a>
                    <a href="{!! url('exemplars/destroy/'.$exemplar->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
@stop