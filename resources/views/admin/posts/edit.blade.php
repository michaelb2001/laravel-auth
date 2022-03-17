@extends('layouts.app')

@section('content')
<form action="{{route("admin.posts.update",$post->id)}}" method="post" class="d-flex flex-column m-5">
  @csrf
  @method("PUT")
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">title</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" 
          value="{{old("title")??$post->title}}">
          @error("title")
              <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="slug" class="col-sm-2 col-form-label">slug</label>
        <div class="col-sm-10">
          <textarea name="content" type="text" class="form-control">{{old("content")??$post->content}}</textarea>
          @error("content")
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">img</label>
          <div class="col-sm-10">
            <input name="img" type="text" class="form-control" value="{{old("img")??$post->img}}">
            @error("img")
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-warning rounded-pill ms-0 my-3"><a href="{{route('admin.posts.index')}}"></a> add</button>
        </div>
      </div>
</form>
@endsection