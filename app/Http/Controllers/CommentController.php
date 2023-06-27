<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function create(Post $post)
    // {
    //     return view('blog.comments.create', compact('post'));
    // }

    public function store(Request $request)
    {
        $validated = validator($request->all(), [
            'title' => ['required', 'string', 'max:10'],
            'content' => ['required', 'string', 'max:1000'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
            'post_id' => ['required', 'string', 'max:2'],
    
        ])->validate();

        // dd($validated);

        $comment = Comment::query()->create([

            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? false, 
            'post_id' => $validated['post_id'],
            // 'admin_id' => Auth::id(); //надо создать сессию
        ]);
    
        return view('blog.comments.store'); 
    }
}

