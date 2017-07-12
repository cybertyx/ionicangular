@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Pedidos</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Data</th>
                <th>Itens</th>
                <th>Entregador</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td class="text-center flex-center">#{{$order->id}}</td>
                <td class="text-center flex-center">{{$order->total}}</td>
                <td class="text-center flex-center">{{$order->created_at}}</td>
                <td class="text-center">
                    <ul class="text-center">
                        @foreach($order->items as $item)
                        <li class="text-center">{{$item->product->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="text-center flex-center">
                    @if($order->deliveryman)
                    {{$order->deliveryman->name}}
                    @else
                    -- 
                    @endif
                </td>
                <td class="text-center flex-center">{{$order->status}}</td>
                <td>
                    <a href="{{route('editorders', $order->id)}}" type="button" class="btn btn-info btn-sm">Editar</a>
                    <a href="{{route('destroyCategories', $order->id)}}" type="button" class="btn btn-danger btn-sm">Deletar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
    {{$orders->render()}}
</div>
@endsection 