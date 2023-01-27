@extends('layouts.app')
@section('content')

  <span class="pe-2">Crea nuovo Post</span>
  <a href="{{route('admin.posts.create')}}">
    <i class="fa-solid fa-square-plus fs-3 my-2 align-middle"></i>
  </a>

   <table class="table">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">category_id</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
           @foreach ($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>
                <a href="{{route('admin.posts.show', $post->id)}}">
                    {{$post->title}}
                </a>
            </td>
            <td>{{$post->body}}</td>
            <td>
                @if ( $post->category)
                    {{$post->category['name']}}
                @endif
            </td>
            <td class="">
                <a href="{{route('admin.posts.edit', $post->id)}}">
                    <i class="fa-solid fa-pen ps-3"></i>
                </a>

                <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn">
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                   </button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="d-flex justify-content-center">
        {{ $posts->links() }}
      </div>


@endsection
