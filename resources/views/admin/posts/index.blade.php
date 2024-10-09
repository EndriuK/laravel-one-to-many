@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex my-3 align-items-center justisfy-content-between">
                    <h2>Elenco posts</h2>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">Aggiungi post</a>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-sm btn-primary me-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit" class="btn btn-sm btn-danger delete-post" onclick="return confirm('Sei sicuro di voler eliminare questo post?')">
                                                <i class="fas fa-trash"></i>
                                            </button> --}}
                                            <button type="submit" class="btn btn-sm btn-danger delete-post" ">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.posts.partials.modal_delete')
@endsection