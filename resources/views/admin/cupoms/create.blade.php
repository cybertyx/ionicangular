@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Novo Cupom</h3>
    @include('errors._checkForm')
    
    {!! Form::open(['route'=>'storecupoms', 'class'=>'form-horizontal']) !!}
    @include('admin.cupoms._form')
    <div class="form-group">
        {!! Form::submit('Criar Cupom', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
