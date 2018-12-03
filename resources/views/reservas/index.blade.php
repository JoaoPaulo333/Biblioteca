@extends('layouts.app')
@section('title')
    Lista Reservas
@stop


@section('content')
    <h1>Listagem de Reservas</h1>

    <a href="{{Route('reservas.create')}}" class="btn btn-success">Cadastrar</a>

    <table name="tbReservas" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Data</th>
            <th>Usuario</th>
            <th>Livro</th>
            <th>Açoes</th>
        </tr>
        </thead>
        @foreach($reservas as $reserva)
            <tr>
                <td>{{$reserva->data}}</td>
                <td>{{$reserva->name}}</td>
                <td>{{$reserva->titulo}}</td>
                <td>
                    <a href="{{Route('reservas.edit',$reserva->id)}}" class="btn-group">
                        <span class="btn btn-primary">Editar</span>
                    </a>
                    <a href="{!! url('reservas/destroy/'.$reserva->id) !!}" class="btn btn-danger">Deletar
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop