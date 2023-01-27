@extends('layouts.app')
@section('content')
   <div>
     <h1>Modifica il post: {{$post->title}}</h1>
   </div>

   <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="my-3">
         <label class="form-label" for="">Titolo</label>
         <input value="{{ $post->title }}" class="form-control" type="text" name="title">
    </div>
    @error('title')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
    @enderror

    <div class="my-3">
        <label class="form-label" for="">Body</label>
        <textarea class="form-control" type="text" name="body">{{ $post->body }}</textarea>
   </div>
    @error('body')
      <div class="alert alert-danger">
        {{ $message }}
      </div>
    @enderror

    <div class="my-3">
        <label for="">Categories</label>
        <select class="form-control" name="category_id" id="">
            <option value="">Seleziona la categoria</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="my-3">
        <label for="" class="pe-2">Tags:</label>
        @foreach ($tags as $tag)
            <label for="" class="p-3">
              <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
              {{ $tag->name }}
            </label>
        @endforeach
    </div>

   <button type="submit" class="btn btn-primary">Modifica</button>
   </form>
@endsection
