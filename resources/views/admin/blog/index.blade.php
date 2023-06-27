@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Главная станица блога админка
@endsection

@section('content')
    <h1 class="mb-5">
        Список постов админка
    </h1>
            {{-- через эмпти условие, если нет постов --}}
    @if(empty($posts))
        Нет постов 
    @else
            {{-- используем для вывода массива в строку --}}
        @foreach($posts as $post)
            {{-- выводим по одному посту с новой строки--}}
            <div class="mb-4">
                <h5>
                    <a href="{{ route('admin.blog.show', $post->id) }}">
                {{ $post->title }}  
                    </a>
                </h5>
                    {{-- используем !! для того, что бы вывести чистый хтмл --}}
                <p>
                    {!! $post->content !!} 
                </p>
            </div>
        @endforeach
    @endif
@endsection