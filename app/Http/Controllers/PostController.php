<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
        public function index()
    {
        $posts = Post::all(); // uzmi sve postove iz baze
        return view('posts.index', compact('posts')); // pošalji ih u view
    }

        public function store(Request $request)
       {
         $validated = $request->validate([
              'title' => 'required',
              'content' => 'required',
          ]);

         Post::create($validated);

         return redirect('/posts')->with('success', 'Post je uspješno dodan!');
       }

       public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect('/posts')->with('success', 'Post je uspješno obrisan!');
}

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $post->update([
        'title' => $request->input('title'),
        'content' => $request->input('content')
    ]);

    return redirect('/posts')->with('success', 'Post je uspješno ažuriran!');
}


}
