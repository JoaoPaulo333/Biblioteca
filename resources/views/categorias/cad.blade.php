@extends('layouts.app')
@section('title')
    Cadastra Categorias
@stop

@section('content')
    @if(isset($categoria))
        <h1>Edita de Categorias</h1>
    @else
        <h1>Cadastra de Categorias</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($categoria))
        <form class="form-group col-md-3 " method="post" action="{{Route('categorias.update',$categoria->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="nome" placeholder="Nome:" value="{{$categoria->nome }}">
            <input class="form-control" type="text" name="assunto" placeholder="Assunto:" value="{{$categoria->assunto }}">
            <input class="form-control" type="text" name="descricao" placeholder="Descricao:" value="{{$categoria->descricao }}">

            @else
                <form class="form-group col-md-3 " method="post" action="{{Route('categorias.store')}}">
                    {!! csrf_field() !!}
                <input class="form-control" type="text" name="nome" placeholder="Nome:" value="{{old('nome')}}">
                <input class="form-control" type="text" name="assunto" placeholder="Assunto:" value="{{old('assunto')}}">
                <input class="form-control" type="text" name="descricao" placeholder="Descricao:" value="{{old('descricao') }}">
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
