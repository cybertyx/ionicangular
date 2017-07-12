@if($errors->any())
@foreach($errors->all() as $error)
<div class="container alert alert-danger col-md-6" role="alert">
    {{$error}}
</div>
@endforeach
@endif