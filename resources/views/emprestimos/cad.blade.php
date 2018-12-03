@extends('layouts.app')
@section('title')
    Cadastra Emprestimo
@stop

@section('content')
    @if(isset($emprestimo))
        <h1>Edita de Emprestimo</h1>
    @else
        <h1>Cadastra de Emprestimo</h1>
    @endif
    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>

    @endif

    @if(isset($emprestimo))
        <form class="form-group col-md-3 " method="post" action="{{Route('emprestimos.update',$emprestimo->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input type="hidden" name="dataIda" value="{{date('d/m/y')}}">//essescampos serao mudados
            <input type="hidden" name="dataVolta" value="{{date('d/m/y')}}">//
            <input type="hidden" name="devolvido" value="{{$emprestimo->devolvido}}">
            <select class="form-control" name="Usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}" @if(isset($emprestimo) && $emprestimo->Usuario_id == $usuario->id ) selected @endif>{{$usuario->name}}</option>
                @endforeach
            </select>
            <select class="form-control" name="Exemplar_id">
                @foreach($exemplars as $exemplar)
                    <option value="{{$exemplar->id}}" @if(isset($emprestimo) && $emprestimo->Exemplar_id == $exemplar->id ) selected @endif>{{$exemplar->titulo}}</option>
                @endforeach
            </select>

            @else
                <form class="form-group col-md-3 " method="post" action="{{Route('emprestimos.store')}}">
                    {!! csrf_field() !!}

                    <input type="hidden" name="dataIda" value="{{date('d/m/y')}}">//essescampos serao mudados
                    <input type="hidden" name="dataVolta" value="{{date('d/m/y')}}">//
                    <input type="hidden" name="devolvido" value="0">
                    <select class="form-control" name="Usuario_id">
                        @foreach($usuarios as $usuario)
                            <option value="{{$usuario->id}}" >{{$usuario->name}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="Exemplar_id">
                        @foreach($exemplars as $exemplar)
                            <option value="{{$exemplar->id}}" >{{$exemplar->titulo}}</option>
                        @endforeach
                    </select>
            @endif


            <button class="btn btn-success">Gravar</button>

        </form>
@stop
