@extends('layouts.admin');


@section('content')

@if(Session::has('delete_post'))

<p class="bg-danger">{{session('delete_post')}}</p>

@endif

@if(Session::has('create_post'))

<p class="bg-primary">{{session('create_post')}}</p>

@endif

@if(Session::has('update_post'))

<p class="bg-warning">{{session('update_post')}}</p>

@endif



<h1>Posts</h1>


<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody> 
    @if($posts)   
         @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/400'}}" alt=""></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr> 
        @endforeach
    @endif
    </tbody>
   
  </table>

    
@endsection