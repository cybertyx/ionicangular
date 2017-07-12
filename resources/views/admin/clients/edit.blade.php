@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Editar Cliente: {{$clients->user->name}}</h3>
    
    {!!Form::model($clients, ['route' => ['updateclients', $clients->id]])!!}
    @include('admin.clients._form')
    <div class="form-group">
        {!! Form::submit('Salvar Cliente', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
