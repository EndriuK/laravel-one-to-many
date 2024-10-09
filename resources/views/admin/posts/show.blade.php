@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>{{ $post->title }}</h2>
                {{-- <h4>{{ $post->category->name }}</h4> --}}
                <h4>{{ $post->category ? $post->category->name : 'Categoria non specificata' }}</h4>
                @if (Str::startsWith($post->cover_image, 'https'))
                    <img class="cover_image" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                @else
                    <img class="cover_image" src="{{ asset('./storage/'.$post->cover_image)}}" alt="{{ $post->title }}">
                @endif
                <p>{{ $post->slug }}</p>
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection