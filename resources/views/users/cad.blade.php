@extends('layouts.app')
@section('title')
    Cadastra User
@stop

@section('content')
    @if(isset($user))
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

    @if(isset($user))
        <form class="form-group col-md-3 " method="post" action="{{Route('users.update',$user->id)}}">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="name" placeholder="Nome:" value="{{$user->name }}">
            <input class="form-control" type="text" name="cpf" placeholder="Cpf:" value="{{$user->cpf }}">
            <input class="form-control" type="text" name="telefone" placeholder="Telefone:" value="{{$user->telefone }}">
            <input class="form-control" type="text" name="email" placeholder="E-mail:" value="{{$user->email }}">
            <input class="form-control" type="password" name="password" placeholder="Senha:"value="{{$user->password }}">
            <select class="form-control" name="tipo">
                <option value="Aluno" @if(isset($user) && $user->tipo == 'Aluno') selected @endif >Aluno</option>
                <option value="Funcionario" @if(isset($user) && $user->tipo == 'Funcionario') selected @endif>Funcionario</option>
                <option value="Professor" @if(isset($user) && $user->tipo == 'Professor') selected @endif>Professor</option>
            </select>

            <input type="hidden" name="punicao" value={{$user->punicao}}>
    @else
        <form class="form-group col-md-3 " method="post" action="{{Route('users.store')}}">
            {!! csrf_field() !!}
            <input class="form-control" type="text" name="name" placeholder="Nome:" value="{{old('name')}}">
            <input class="form-control" type="text" name="cpf" placeholder="Cpf:" value="{{old('cpf') }}">
            <input class="form-control" type="text" name="telefone" placeholder="Telefone:" value="{{old('telefone')}}">
            <input class="form-control" type="text" name="email" placeholder="E-mail:" value="{{old('email') }}">
            <input class="form-control" type="password" name="password" placeholder="Senha:"value="{{old('password') }}">
            <select class="form-control" name="tipo">
                <option value="Aluno"  >Aluno</option>
                <option value="Funcionario" >Funcionario</option>
                <option value="Professor" >Professor</option>
            </select>
            <input type="hidden" name="punicao" value="0">
    @endif


        <button class="btn btn-success">Gravar</button>

    </form>
@stop
