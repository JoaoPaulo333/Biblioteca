@extends('layouts.app')
@section('title')
    Cadastra Exemplares
@stop

@section('content')
    @if(isset($exemplar))
        <h1>Edita de Exemplares</h1>
    @else
        <h1>Cadastra de Exemplares</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($exemplar))
        <form class="form-group col-md-3 " method="post" action="{{Route('exemplars.update',$exemplar->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="hidden" name="disponivel"   value="{{$exemplar->disponivel }}">
            <input class="form-control" type="file" name="arquivo">
            <select class="form-control" name="Livro_id">
                @foreach($livros as $livro)
                    <option value="{{$livro->id}}" @if(isset($exemplar) && $exemplar->Livro_id == $livro->id ) selected @endif>{{$livro->titulo}}</option>
                @endforeach
            </select>

            @else
                <form class="form-group col-md-3 " method="post" enctype="multipart/form-data" action="{{Route('exemplars.store')}}">
                    {!! csrf_field() !!}

                    <input class="form-control" type="hidden" name="disponivel"   value="1">
                    <input class="form-control" type="file" name="arquivo">
                    <select class="form-control" name="Livro_id">
                        @foreach($livros as $livro)
                            <option value="{{$livro->id}}" >{{$livro->titulo}}</option>
                        @endforeach
                    </select>
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
