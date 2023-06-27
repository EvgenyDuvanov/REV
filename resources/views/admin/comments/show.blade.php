@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Комментарий
@endsection



@section('content')

<x-title class="">
    {{ __('Просмотр комментария') }}
        <x-slot name="right">
                
                <a type="submit" class="btn btn-success" href="{{ route('admin.comments.edit', $comment->id) }} ">
                {{ __('Редактировать коммент') }}
            </a>
        </x-slot>
</x-title>

<a href="{{ route('admin.comments') }}">
    {{ __('Назад') }}
</a>

<div class="mb-5">
    <h2 class="h4">
        {{ $comment->title }}  
    </h2>
    
    <div class="pt-3">
        {{ $comment->content }}  
    </div>
    
    
</div>   
    
@endsection