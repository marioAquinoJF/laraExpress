@extends('app')
@section('content')
<h1>Create new Post</h1>
@if($errors->any())
<ul class="alert">
    @foreach($errors->all() as $e)
    <li> {{ $e }}</li>
    @endforeach

</ul>
@endif
{!! Form::open(['route'=>'admin.post.store','method'=>'post']) !!}
@include('admin.posts._form')
<div class="form-group">
    {!! Form::label('tags','Tags: ') !!}
    {!! Form::textarea('tags', null,['class'=>'form-control']) !!}      
</div>
<div class="form-group">
    {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}    
</div>

{!! Form::close() !!}
@endsection
