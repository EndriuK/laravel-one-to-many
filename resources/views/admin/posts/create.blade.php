@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Aggiungi post</h2>
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
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="row gy-3">
                        <div class="col-12">
                            <label for="title" class="control-label">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control form-control-sm @error('title')) is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 
                        <div class="col-12">
                            <label for="" class="control-label">Immagine copertina</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control form-control-sm">
                        </div>
                        <div class="col-12">
                            <label for="" class="control-label">Categorie</label>
                            <select name="category_id" id="category_id" class="form-select form-select-sm" required>
                                <option value="">-Seleziona una categoria-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    
                                @endforeach
                            </select>

                        </div>
                        <div class="col-12">
                            <label for="content" class="control-label">Contenuto</label>
                            <textarea name="content" id="content-post" class="form-control form-control-sm" rows="10" cols="30">{{ old('content') }}</textarea>
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