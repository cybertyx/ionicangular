@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Clientes</h3>
    <a href="{{route('createClients')}}" class="btn btn-default">Novo Cliente</a><br /><br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Telefone</th>
                <th>Usuário</th>
                <th>Ação</th>
            </tr>
        <tbody>
            @foreach($clients as $cliente)
            <tr>
                <td class="text-center flex-center">{{$cliente->id}}</td>
                <td>{{$cliente->user->name}}</td>
                <td>{{$cliente->phone}}</td>
                <td>{{$cliente->address}}</td>
                <td>
                    <a href="{{route('editclients', $cliente->id)}}" type="button" class="btn btn-info btn-sm">Editar</a>
                    <a href="{{route('destroyclients', $cliente->id)}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    {{$clients->render()}}
</div>
@endsection 