@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                            <div class="form-control">
                                <a href="{{Route('graficos.index')}}" name="bt1" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar grafico emprestimos</span>
                                </a>
                                <a href="{{url('graficos/show')}}" name="bt2" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar grafico Reservas</span>
                                </a>
                                <a href="{{url('grafico/graf')}}" name="bt3" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar grafico Reservas por Categoria</span>
                                </a>
                                <a href="{{url('grafico/graf1')}}" name="bt4" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar grafico Emprestimo por Categoria</span>
                                </a>
                                <a href="{{url('grafico/graf2')}}" name="bt5" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >total de livros reservados e emprestados,</span>
                                </a>
                            </div>
                            <div class="form-control">
                                <a href="{{url('relatorios/index')}}" name="bt6" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar Relatorio de Todos os livros e numero de exemplares</span>
                                </a>
                                <a href="{{url('relatorios/index2')}}" name="bt3" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar Relatorio de Todos os livros Emprestados</span>
                                </a>
                                <a href="{{url('relatorios/index3')}}" name="bt4" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar Relatorio de Todos os livros Reservados</span>
                                </a>
                                <a href="{{url('relatorios/index4')}}" name="bt5" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar Relatorio de Usuarios</span>
                                </a>
                                <a href="{{url('relatorios/index5')}}" name="bt5" target="_blank" class="btn-group">
                                    <span class="btn btn-primary" >gerar Relatorio de Livros atrasados</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
