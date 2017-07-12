@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Editar Produto: {{$product->name}}</h3>
    @include('errors._checkForm')
    
    {!! Form::model($product, ['route'=>['updateProducts', $product->id], 'class'=>'form-horizontal']) !!}
    @include('admin.products._form')
    <div class="form-group">
        {!! Form::submit('Salvar Produto', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 

