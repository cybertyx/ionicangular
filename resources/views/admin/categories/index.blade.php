@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Categorias</h3>
    <a href="{{route('createCategories')}}" class="btn btn-default">Nova Categoria</a><br /><br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="text-center flex-center">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('editCategories', $category->id)}}" type="button" class="btn btn-info btn-sm">Editar</a>
                    <a href="{{route('destroyCategories', $category->id)}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    {{$categories->render()}}
</div>
@endsection 