@extends('layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Блог
@endsection

@section('content')
<x-title>
    {{ __('Список постов') }}
</x-title>

<section>
    <x-container>
                {{-- через эмпти условие, если нет постов --}}
    @if(empty($posts))
    {{ __('Нет ни одного поста') }}
    @else

        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 col-md-4">
                        {{-- указываем :post что бы определить переменную --}}
                    <x-post.card :post="$post" />
                </div>
            @endforeach
        </div>

    {{ $posts->links() }}
@endif
    </x-container>
</section>
@endsection