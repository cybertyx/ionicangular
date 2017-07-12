@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Editar Categoria: {{$cat->name}}</h3>
    
    {!!Form::model($cat, ['route' => ['upgradeCategories', $cat->id]])!!}
    @include('admin.categories._form')
    <div class="form-group">
        {!! Form::submit('Salvar Categoria', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
