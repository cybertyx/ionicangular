@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Produtos</h3>
    <a href="{{route('createProducts')}}" class="btn btn-default">Novo Produto</a><br /><br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="text-center flex-center">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('editProducts', ['id' => $product->id])}}" type="button" class="btn btn-info btn-sm">Editar</a>
                    <a href="{{route('destroyProducts', ['id' => $product->id])}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    {{$products->render()}}
</div>
@endsection 