@extends('layouts.app')
@section('title')
    Cadastra Livro
@stop

@section('content')
    @if(isset($autor))
        <h1>Edita de Autores</h1>
    @else
        <h1>Cadastra de Autores</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($autor))
        <form class="form-group col-md-3 " method="post" action="{{Route('autors.update',$autor->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="nome" placeholder="Nome:" value="{{$autor->nome }}">

            @else
                <form class="form-group col-md-3 " method="post" action="{{Route('autors.store')}}">
                    {!! csrf_field() !!}
                <input class="form-control" type="text" name="nome" placeholder="Nome:" value="{{old('nome')}}">
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
