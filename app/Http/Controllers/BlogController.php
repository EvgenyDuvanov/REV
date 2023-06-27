<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Показать список всех постов
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {   

        // $posts = Post::where('published', 1)->get(['id', 'title', 'published_at']); //сделать пагинацию
        $posts = Post::where('published', 1)->paginate(3, ['id', 'title', 'published_at']); //сделать пагинацию

        return view('blog.index', compact('posts'));
        
    }

   

    public function show(Request $request, Post $post)
    {
        $comments = $post->comments()->where('published', 1)->paginate(3, ['id', 'title', 'content']); // пагинация для комментов, форма коммента на старнице поста

    // dd($post, $comments);

        //через компакт передаем один пост 
        return view('blog.show', compact('post', 'comments'));
         }


} 


// $comments = $post->comments()->get();




// удалить таблицу админа, оставить юзера - !
// добавить в таблицу юзера строку ролей - !
// перенести форму создания коммента на страницу поста - !
// добавить пагинацию на страницу постов
// добавить пагинацию к комментариям 
