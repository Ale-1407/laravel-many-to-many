@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>{{ $singolo_post->title}}</h1>
        <p>{{ $singolo_post->body }}</p>
    </div>
@endsection
