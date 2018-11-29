@extends('layouts.app')
@section('title')
    Lista User
    @stop


@section('content')
    <h1>Listagem de Usuarios</h1>

    <a href="{{Route('users.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbUsers" class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Password</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>Punicao</th>
                <th>Data Punicao</th>
                <th>Ações</th>
            </tr>
        </thead>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->telefone}}</td>
                <td>{{$user->tipo}}</td>
                <td>{{$user->punicao}}</td>
                <td>{{$user->dataPunicao}}</td>
                <td>
                    <a href="{{Route('users.edit',$user->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="" class="btn-group">
                        <span class="btn btn-danger">Deletar</span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop