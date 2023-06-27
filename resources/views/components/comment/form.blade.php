@props(['post' => null])

<x-form {{ $attributes->merge([

    'method' => 'post',

]) }}>

    <x-form-item>
        <label class="h4 ">Имя автора</label>
        <input placeholder="{{ __('Название поста') }}" name="title" value="{{ $comment->title ?? '' }}" class="form-control" autofocus>
    </x-form-item>
{{-- вывод ошибок под каждой строкой формы --}}

    <x-form-item>
        <label class="h4">Содержание комментария</label>
        <textarea placeholder="{{ __('Содержание поста') }}" name="content"  class="form-control" rows="7" cols="50">{{ $comment->content ?? '' }}</textarea>
    </x-form-item>

    <x-form-item>
    <label class="h4 ">Дата публикации комментария</label>
    <input name="published_at"  class="form-control" rows="7" cols="50" placeholder="dd.mm.yy">
    </x-form-item>

    <x-form-item>
        <label class="h4 ">Статус публикации коммента</label>
        <input placeholder="{{ __('Укажите статус публикации') }}" name="published" class="form-control" value="{{ $comment->published ?? '' }}">
    </x-form-item>

    <x-button>Опубликовать комментарий</x-button>
</x-form>