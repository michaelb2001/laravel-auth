@extends('layouts.app')

@section('content')
<a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-primary m-3">add post</button></a>
    <div class="container-fluid d-flex">
        <div class="col-2 bordered">
            <ul>
                <li>
                    <i class="fa-solid fa-house"></i>
                    <a href="{{route('admin.home')}}">Dashboard</a> 
                </li>
                <li>
                    <i class="fa-solid fa-clone"></i>
                    <a href="{{route('admin.posts.index')}}">Posts</a> 
                </li>
            </ul>
        </div>

        <div class="col-8 p-3 bordered">
            @foreach($posts as $post)
            <div class="container d-flex flex-column align-items-start">
            <h1>{{$post->title}}</h1>
            <img src="{{$post->img}}" alt="{{$post->title}}">
            <ul class="p-0">
                <strong>content:</strong> 
                <li>
                    {{$post->content}}
                </li>
            </ul>
            <div class="d-flex">
                <a href="{{route("admin.posts.show", $post->id)}}"><button type="button" class="btn btn-primary m-3">See More</button></a>  <!--con questo bottone richiamo la rotta posts/show dove show sarà il numero id del mio elemento.Quindi verrò indirizzato alla vista show.blade.php-->
                <a href="{{route("admin.posts.edit", $post->id)}}"><button type="button" class="btn btn-primary m-3">Edit</button></a>  <!--con questo bottone richiamo la rotta posts/edit dove potrò modificare il mio elemento.Quindi verrò indirizzato alla vista edit.blade.php-->
                <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST" onsubmit="return confirm('sicuro?')">
                    @csrf
                    
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger m-3">Delete</button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
        </div>
    </div>
@endsection