<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
// список комментов, которые в очереди на публикацию, РАБОТАЕТ
        $comments = Comment::where('published', 0)->get(['id', 'title', 'published']);
        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function show(Request $request, Comment $comment)
    {
//конкретный пост перед редакт РАБОТАЕТ
        return view('admin.comments.show', compact('comment'));

    }
//форма изменения коммента, но не отображает статус published!!!
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

//работает, обновляет!
    public function update(Request $request, Comment $comment)
    {
        $validated = validator($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:1000'],
            'published' => ['nullable', 'boolean'],
            'post_id' => ['required', 'string', 'max:2'],
    
        ])->validate();

        $comment->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published' => $validated['published'] ?? false,
        ]);

        return redirect()->route('admin.comments', $comment);;
    }

    public function delete()
    {
        return 'Удаление коммента напрочь';
    }

}



