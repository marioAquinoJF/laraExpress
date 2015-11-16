@extends('app')
@section('content')
<h1>Blog Admin</h1>
<p>
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Novo Post</a>
</p>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Action</th>
    </tr>
    @foreach($posts as $p)

    <tr>
        <td>
            {{ $p->id }}
        </td>
        <td>
            {{ $p->title }}
        </td>
        <td>
            <a href="{{ route('admin.post.edit',['id'=>$p->id]) }}" class="btn btn-default">Edit</a>
            <a href="{{ route('admin.post.destroy',['id'=>$p->id]) }}" class="btn btn-danger">Del</a>
        </td>
    </tr>

    @endforeach
</table>
{!! $posts->render()!!}
@endsection
