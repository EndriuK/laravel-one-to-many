@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Modifica post</h2>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="post">
                    @csrf
                    @method('PUT')
                   <div class="row gy-3">
                        <div class="col-12">
                            <label for="title" class="control-label">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control form-control-sm @error('title')) is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                        <div class="col-12">
                            @if (Str::startsWith($post->cover_image, 'https'))
                                <img class="cover_image" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                            @else
                                <img class="cover_image" src="{{ asset('./storage/'.$post->cover_image)}}" alt="{{ $post->title }}">
                            @endif
                            <div class="mt-3">
                                <label for="" class="control-label">Immagine di copertina</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="content" class="control-label">Contenuto</label>
                            <textarea name="content" id="content-post" class="form-control form-control-sm" rows="10" cols="30">{{ old('content', $post->content) }}</textarea>
                        </div>  
                        <div class="col-12">
                            <button class="btn btn-sm btn-success" type="submit">Salva</button>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection