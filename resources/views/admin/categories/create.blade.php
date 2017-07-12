@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Nova Categorias</h3>
    @include('errors._checkForm')
    
    {!! Form::open(['route'=>'storeCategories', 'class'=>'form-horizontal']) !!}
    @include('admin.categories._form')
    <div class="form-group">
        {!! Form::submit('Criar Categoria', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
