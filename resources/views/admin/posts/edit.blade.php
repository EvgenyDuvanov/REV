@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Редактирование поста
@endsection

@section('content')

<x-title class="">
    {{ __('Редактирование') }}
</x-title>

<a href="{{ route('admin.posts.show', $post->id) }}">
    {{ __('Назад') }}
</a>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $message)
                <li>
                    {{ $message }}
                </li>
            @endforeach
        </ul>
    </div>  
@endif

<x-post.form action="{{ route('admin.posts.update', $post->id) }}" method="put" :post="$post" />

@endsection
