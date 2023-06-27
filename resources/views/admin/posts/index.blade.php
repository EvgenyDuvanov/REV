@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Посты
@endsection

@section('content')
<x-title>
    {{ __('Список постов') }}

    <x-slot name="right">
        <a type="submit" class="btn btn-success" href="{{ route('admin.posts.create') }}">
            {{ __('Создать пост') }}
        </a>
    </x-slot>
</x-title>

<section>
    <x-container>
        {{-- через эмпти условие, если нет постов --}}
@if(empty($posts))
{{ __('Нет ни одного поста') }}
@else
{{-- используем для вывода массива в строку --}}

<div class="row">
    @foreach($posts as $post)
       
       <div class="mb-5">
            <h2 class="h4">
                <a href="{{ route('admin.posts.show', $post->id) }}">
            {{ $post->title }}  
                </a>
            </h2>
            <div class="small text-muted">
                {{-- now возвращает объект, с которым можно работать далее. КАРБОН. ФОрмат форматирует --}}
                {{ now()->format('d.m.y') }}
            </div>
       </div>   
           
  
    @endforeach
</div>

@endif
</x-container>
</section>



    
    
@endsection