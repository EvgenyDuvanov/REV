@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Главная станица блога админка
@endsection

@section('content')
    <h2 class="mb-5">
        Список новых комментариев требующих подтверждения
    </h2>

    @if(empty($comments))
        Нет постов 
    @else

        @foreach($comments as $comment)
            {{-- выводим по одному посту с новой строки--}}
            <div class="mb-4">
                <h5>
                    <a href="{{ route('admin.comments.show', $comment->id) }}">
                {{ $comment->title }}  
                    </a>
                </h5>
            </div>
        @endforeach
    @endif
@endsection

{{-- {{ route('admin.comment.edit', $comment->id) }} --}}