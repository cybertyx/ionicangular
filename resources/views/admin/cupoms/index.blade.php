@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Cupons</h3>
    <a href="{{route('createcupoms')}}" class="btn btn-default">Novo Cupom</a><br /><br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
        <tbody>
            @foreach($cupoms as $cupom)
            <tr>
                <td class="text-center flex-center">{{$cupom->id}}</td>
                <td>{{$cupom->code}}</td>
                <td>{{$cupom->value}}</td>
                <td>
                    <a href="{{route('editcupoms', $cupom->id)}}" type="button" class="btn btn-info btn-sm">Editar</a>
                    <a href="{{route('destroycupoms', $cupom->id)}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    {{$cupoms->render()}}
</div>
@endsection 