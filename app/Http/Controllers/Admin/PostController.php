<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $form_data = $request->validated();
        $slug = Post::generateSlug($form_data['title']);
        $form_data['slug'] = $slug;

        // Verifica se request abbia il file cover_image
        if ($request->hasFile('cover_image')) {

            // Effetua l'upload del file e salvo il path dell'immagine in una variabile
            $path = Storage::disk('public')->put('cover_images', $form_data['cover_image']);

            // Assegno il valore contenuto nella variavile alla chiave 'cover_image' di 'form_data'
            $form_data['cover_image'] = $path;
        } else {
            $form_data['cover_image'] = 'https://placehold.co/600x400?text=Immagine+copertina';
        }

        $post = new Post();
        $post->fill($form_data);
        $post->save();
        return redirect()->route('admin.posts.index')->with('message', 'Post creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Post::generateSlug($form_data['title']);
        $post->update($form_data);

        return redirect()->route('admin.posts.index')->with('message', 'Post modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
