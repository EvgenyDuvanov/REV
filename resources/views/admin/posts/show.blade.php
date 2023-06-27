@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Пост
@endsection



@section('content')

<x-title class="">
    {{ __('Просмотр поста') }}
        <x-slot name="right">
            <a type="submit" class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}">
                {{ __('Редактировать пост') }}
            </a>
        </x-slot>
</x-title>

<a href="{{ route('admin.posts') }}">
    {{ __('Назад') }}
</a>

<div class="mb-5">
    <h2 class="h4">
        {{ $post->title }}  
    </h2>
    <div class="small text-muted">
        {{-- now возвращает объект, с которым можно работать далее. КАРБОН. ФОрмат форматирует --}}
        {{ now()->format('d.m.y') }}
    </div>
    <div class="pt-3">
        {{ $post->content }}  
    </div>
    
    
</div>   
    
@endsection