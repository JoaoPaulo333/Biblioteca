@extends('layouts.app')
@section('title')
    Cadastra Livro
@stop

@section('content')
    @if(isset($livro))
        <h1>Edita de Usuarios</h1>
    @else
        <h1>Cadastra de Usuarios</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($livro))
        <form class="form-group col-md-3 " method="post" action="{{Route('livros.update',$livro->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="titulo" placeholder="Titulo:" value="{{$livro->titulo }}">
            <input class="form-control" type="text" name="isbn" placeholder="ISBN:" value="{{$livro->isbn }}">
            <input class="form-control" type="text" name="edicao" placeholder="Edicao:" value="{{$livro->edicao }}">
            <input class="form-control" type="text" name="editora" placeholder="Editora:" value="{{$livro->editora }}">
            <input class="form-control" type="number" name="ano" placeholder="Ano:" value="{{$livro->ano }}">
            <select class="form-control" name="Autor_id">
                @foreach($autores as $autor)
                    <option value="{{$autor->id}}" @if(isset($livro) && $livro->Autor_id == $autor->id ) selected @endif>{{$autor->nome}}</option>
                @endforeach
            </select>
            <select class="form-control" name="Categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" @if(isset($livro) && $livro->Categoria_id == $categoria->id ) selected @endif>{{$categoria->nome}}</option>
                @endforeach
            </select>

            @else
                <form class="form-group col-md-3 " method="post" action="{{Route('livros.store')}}">
                    {!! csrf_field() !!}
                <input class="form-control" type="text" name="titulo" placeholder="Titulo:" value="{{old('titulo')}}">
                <input class="form-control" type="text" name="isbn" placeholder="ISBN:" value="{{old('isbn')}}">
                <input class="form-control" type="text" name="edicao" placeholder="Edicao:" value="{{old('edicao') }}">
                <input class="form-control" type="text" name="editora" placeholder="Editora:" value="{{old('editora') }}">
                <input class="form-control" type="number" name="ano" placeholder="Ano:" value="{{old('ano') }}">
                <select class="form-control" name="Autor_id">
                    @foreach($autores as $autor)
                        <option value="{{$autor->id}}">{{$autor->nome}}</option>

                    @endforeach
                </select>
                <select class="form-control" name="Categoria_id">
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
