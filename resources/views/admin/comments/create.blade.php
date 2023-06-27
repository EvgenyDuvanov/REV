@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Создание нового комментария
@endsection
{{-- 
@section('content')

    <x-title>
        {{ __('Создание комментария') }}
    </x-title>

    <a href="{{ route('blog/{post}'), $post->id }}">
        {{ __('Назад') }}
    </a>

    <x-post.rev-form action="{{ route('blog.comments.store') }}" method="post"  />



@endsection --}}


@section('content')

    <x-title>
        {{ __('Создание комментария') }}
    </x-title>

    <a href="{{ route('blog/{post}'), $post->id }}">
        {{ __('Назад') }}
    </a>

    <x-post.rev-form action="{{ route('blog.comments.store') }}" method="post"  />



@endsection