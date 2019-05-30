@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Categorias</h1></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-section">
                                <p class="clearfix">
                                    <a href="categories/new" class="btn btn-success pull-right">Nova Categoria</a>
                                </p>

                                <table class="table mt-20  alert-success">  
                                    <thead>              
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="" class="btn btn-warning btn">Editar</a>
                                                <a href="" class="btn btn-danger btn">Excluir</a>
                                            </td>
                                        </tr>                        
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection