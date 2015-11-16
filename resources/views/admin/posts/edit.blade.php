@extends('app')
@section('content')
<h1>Edit Post</h1>
@if($errors->any())
<ul class="alert">
    @foreach($errors->all() as $e)
    <li> {{ $e }}</li>
    @endforeach
    
</ul>
@endif
{!! Form::model($post,['route'=>['admin.post.update',$post->id],'method'=>'put']) !!}
@include('admin.posts._form')
<div class="form-group">
    {!! Form::label('tags','Tags: ') !!}
    {!! Form::textarea('tags', $post->TagList,['class'=>'form-control']) !!}      
</div>
<div class="form-group">
    {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}    
</div>

{!! Form::close() !!}
@endsection
