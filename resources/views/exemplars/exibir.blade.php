@extends('layouts.app')
@section('title')
    Exemplar
@stop

@section('content')
    @if(isset($exemplar->arquivo))
        <img src="{{url("storage/arquivos/".$exemplar->arquivo)}}"/>
    @else
        <h1>Este exemplar nao possui um Arquivo</h1>
    @endif

@stop
