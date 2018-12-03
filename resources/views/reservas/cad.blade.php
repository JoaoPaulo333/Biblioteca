@extends('layouts.app')
@section('title')
    Cadastra Reservas
@stop

@section('content')
    @if(isset($reserva))
        <h1>Edita de Reservas</h1>
    @else
        <h1>Cadastra de Reservas</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($reserva))
        <form class="form-group col-md-3 " method="post" action="{{Route('reservas.update',$reserva->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="date" name="data" placeholder="Data:" value="{{$reserva->data}}">
            <select class="form-control" name="Livro_id">
                @foreach($livros as $livro)
                    <option value="{{$livro->id}}" @if(isset($reserva) && $reserva->Livro_id == $livro->id ) selected @endif>{{$livro->titulo}}</option>
                @endforeach
            </select>
            <select class="form-control" name="Usuario_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($reserva) && $reserva->Usuario_id == $user->id ) selected @endif>{{$user->name}}</option>
                @endforeach
            </select>

            @else
                <form class="form-group col-md-3 " method="post" action="{{Route('reservas.store')}}">
                    {!! csrf_field() !!}
                <input class="form-control" type="date" name="data" placeholder="Data:" value="{{old('data')}}">

                    <select class="form-control" name="Livro_id">
                        @foreach($livros as $livro)
                            <option value="{{$livro->id}}" >{{$livro->titulo}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="Usuario_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
