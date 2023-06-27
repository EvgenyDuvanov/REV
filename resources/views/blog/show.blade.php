@extends('layouts.main')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')

    {{ $post->title }}
    
@endsection

@section('main.content')

<a href="{{ route('blog') }}">
    назад
</a>

<x-card>
    <x-card-header>
        <h2>
            {{ $post->title }}
        </h2> 
    </x-card-header>

        <p class="mt-3 mb-3 card-body border-bottom">
            {!! $post->content !!}
        </p>

        <form action="{{ route('blog.comments.store') }}" method="POST">
            @csrf
            
            <x-form-item>
                <input placeholder="{{ __('Ваше имя') }}" name="title" class="form-control" autofocus> 
            </x-form-item>
            
            @if($errors->has('title'))
                <div class="small text-danger pt-1">
                    Пожалуйста укажите ваше имя! 
                </div>  
            @endif
            
            <x-form-item>
                <textarea placeholder="{{ __('Добавьте ваш комментарий') }}"  name="content" class="form-control" rows="7" cols="50"></textarea>
            </x-form-item>
            
            @if($errors->has('content'))
                <div class="small text-danger pt-1">
                    Поле должно быть заполнено! 
                </div>  
            @endif
            
                <input type="hidden" name="published" value="0">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            
                <button type="submit" class="btn btn-primary">
                    Отправить комментарий
                </button>
            </form>






        <h1 class="h4 mb-1 card-body">
            {{ __('Коментарии:') }}
        </h1>

        <section>
            <div class="container"> 
            
                @if(empty($comments))
                {{ __('Нет ни одного комментария') }}

                @else
                <div class="row">

                    @foreach($comments as $comment)
                    <div>
                        <h3>{{ $comment->title }}</h3>
                        <p>{{ $comment->content }}</p>
                    </div>
                    @endforeach
                </div>
                {{ $comments->links() }}
                @endif
            </div>
        </section>
</x-card>
@endsection




