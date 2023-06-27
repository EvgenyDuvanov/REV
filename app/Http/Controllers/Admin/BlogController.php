<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
   //вывести списком все посты в блоке
    public function index()
    { 
        $posts = DB::select('select * from posts where published = ?', [1]);
        return view('admin.blog.index', ['posts' => $posts]);
    }

    //вывести конкретный пост
    public function show(Request $request, Post $post)
    {
        return view('admin.blog.show', compact('post'));
    }
}
