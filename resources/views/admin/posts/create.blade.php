@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Создание нового поста
@endsection

@section('content')

    <x-title>
        {{ __('Создание нового поста') }}
    </x-title>

    <a href="{{ route('admin.posts') }}">
        {{ __('Назад') }}
    </a>

<x-post.form action="{{ route('admin.posts.store') }}" method="post" />

@endsection