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
}
