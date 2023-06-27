@props(['post' => null])

<x-form {{ $attributes->merge([

    'method' => 'post',

]) }}>
 {{-- сообщения об ошибках общее --}}

 {{-- @if($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach($errors->all() as $message)
             <li>
                 {{ $message }}
             </li>
         @endforeach
     </ul>
 </div>  
@endif --}}


    <x-form-item>
        

        <label class="h4 ">Название поста</label>
        <input placeholder="{{ __('Название поста') }}" name="title" value="{{ $post->title ?? '' }}" class="form-control" autofocus>
    </x-form-item>
{{-- вывод ошибок под каждой строкой формы --}}
    @if($errors->has('title'))
    <div class="small text-danger pt-1">
        Поле должно быть заполнено! 
    </div>  
   @endif

    <x-form-item>
        <label class="h4 ">Содержание поста</label>
        <textarea placeholder="{{ __('Содержание поста') }}" name="content"  class="form-control" rows="7" cols="50">{{ $post->content ?? '' }}</textarea>
    </x-form-item>

    @if($errors->has('content'))
    <div class="small text-danger pt-1">
        Поле c содержанием поста должно быть заполнено! 
    </div>  
   @endif

    <x-form-item>
    <label class="h4 ">Дата публикации поста</label>
    <input name="published_at"  class="form-control" rows="7" cols="50" placeholder="dd.mm.yy">
    </x-form-item>

    <x-form-item>
        <label class="h4 ">ID администратора</label>
        <input placeholder="{{ __('Укажите ID администратора') }}" name="user_id" class="form-control">
    </x-form-item>
   
    <input type="hidden" name="published" value="1">

    <input type="hidden" id="name" value="{{ $post->id ?? '' }}" >

    <x-button>Опубликовать пост</x-button>
</x-form>