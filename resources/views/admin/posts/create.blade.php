@extends('layouts.app')

@section('content')
    <form action="{{route("admin.posts.store")}}" method="post" class="d-flex flex-column m-5">
        @csrf
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">title</label>
              <div class="col-sm-10">
                <input name="title" type="text" class="form-control @error("title") is-invalid @enderror" id="title" 
                value="{{old("title")}}">
                @error("title")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="content" class="col-sm-2 col-form-label">content</label>
              <div class="col-sm-10">
                <textarea name="content" type="text" class="form-control  @error("content") is-invalid @enderror">{{old("content")}}</textarea>
                @error("content")
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
                <label for="img" class="col-sm-2 col-form-label">img</label>
                <div class="col-sm-10">
                  <input name="img" type="text" class="form-control">
                </div>
              </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-warning rounded-pill ms-0 my-3">add</button>
              </div>
            </div>
    </form>

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
    @endif
@endsection