@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Novo Produto</h3>
    @include('errors._checkForm')
    
    {!! Form::open(['route'=>'storeProducts', 'class'=>'form-horizontal']) !!}
    @include('admin.products._form')
    <div class="form-group">
        {!! Form::submit('Criar Produtos', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
