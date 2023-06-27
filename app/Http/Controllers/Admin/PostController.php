<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //при первом методе подключения к БД

class PostController extends Controller
{
    public function index()
    { 
    // $posts = DB::select('select * from posts where published = ?', [1]);
    // return view('admin.posts.index', ['posts' => $posts]);
    $posts = Post::all('id', 'title', 'published');
    return view('admin.posts.index', compact('posts'));
    }

    public function show(Request $request, Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {

    $validated = validator($request->all(), [
        'title' => ['required', 'string', 'max:100'],
        'content' => ['required', 'string', 'max:5000'],
        'published_at' => ['nullable', 'string', 'date'],
        'published' => ['nullable', 'boolean'],
        'user_id' => ['required', 'string', 'max:2'],

    ])->validate();

    
    // dd($validated);

        $post = Post::query()->create([

            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at'] ?? null),
            'published' => $validated['published'] ?? true, //хз почему не видит 
            'user_id' => $validated['user_id'],
            // 'user_id' => Auth::id(); //надо создать сессию
        ]);


        return redirect()->route('admin.posts.show', $post);
    }

    public function edit(Post $post)
    {
 
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = validator($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:5000'],
            // 'published' => ['nullable', 'boolean'],
            'user_id' => ['required', 'string', 'max:2'],
    
        ])->validate();

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published' => $validated['published'] ?? true,
        ]);


        return redirect()->route('admin.posts.show', $post);
    }
}
