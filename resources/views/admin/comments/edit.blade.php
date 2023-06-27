@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Измение статуса нового комментария 
@endsection

@section('content')

<x-title class="">
    {{ __('Изменение статуса') }}
</x-title>

<a href="{{ route('admin.comments.show', $comment->id) }}">
    {{ __('Назад к просмотру комментария') }}
</a>

 
<form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label class="mt-2">Имя автора комментария</label>
    <input class="form-control mt-3" type="text" name="title" value="{{ $comment->title }}">

    <label class="mt-2">Содержание комментария</label>
    <input class="form-control mt-3" type="text" name="content" value="{{ $comment->content }}">

    <label class="mt-2">ID поста</label>
    <input class="form-control mt-3"  type="text" name="post_id" value="{{ $comment->post_id }}">

    <label class="mt-4">Статус публикации: 1 - опубликовать; 0 - оставить в очереди</label>
    <input class="form-control mt-3"  type="text" name="published" value="{{ $comment->published }}">
    
    <button type="submit" class="btn btn-primary mt-5">
        Опубликовать комментарий
    </button>
</form>


{{-- <x-comment.form action="{{ route('admin.comments.update', $comment->id) }}" method="POST" /> --}}

@endsection