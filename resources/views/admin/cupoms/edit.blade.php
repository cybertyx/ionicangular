@extends('layouts/app')
@section('content')
<div class="container">
    <h3>Editar Cupom: {{$cupom->name}}</h3>
    
    {!!Form::model($cupom, ['route' => ['updatecupoms', $cupom->id]])!!}
    @include('admin.cupoms._form')
    <div class="form-group">
        {!! Form::submit('Salvar Cupom', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection 
