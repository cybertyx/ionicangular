@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Novo Cliente</h3>
    @include('errors._checkForm')
    
    {!! Form::open(['route'=>'storeclients', 'class'=>'form-horizontal']) !!}
    @include('admin.clients._form')
    <div class="form-group">
        {!! Form::submit('Criar Cliente', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
