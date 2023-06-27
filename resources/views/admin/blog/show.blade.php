@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    {{ $post->title }}
@endsection

@section('content')

<a href="{{ route('admin.blog') }}">
    назад
</a>

    <h1 class="mb-5">
        {{ $post->title }}
    </h1>
    
    <p>
        {{ $post->content }}
    </p>
   
@endsection