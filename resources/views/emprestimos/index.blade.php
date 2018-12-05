@extends('layouts.app')
@section('title')
    Lista Emprestimos
@stop


@section('content')
    <h1>Listagem de Emprestimos</h1>

    @if ($user == 'Funcionario' || $user == 'Bibliotecario')
    <a href="{{Route('emprestimos.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbEmprestimos" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Data Ida</th>
            <th>Data Volta</th>
            <th>Usuario</th>
            <th>Livro</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($emprestimos as $emp)
            <tr>
                <td>{{$emp->dataIda}}</td>
                <td>{{$emp->dataVolta}}</td>
                <td>{{$emp->name}}</td>
                <td>{{$emp->titulo}}</td>
                <td>
                    <a href="{{Route('emprestimos.edit',$emp->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="{!! url('emprestimos/destroy/'.$emp->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
        @endif
    </table>
@stop