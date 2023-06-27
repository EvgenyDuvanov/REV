@props(['post' => null])

<x-form {{ $attributes->merge([

    'method' => 'post',

]) }}>

    {{-- <input type="hidden" name="post_id" value="{{ $post->id }}"> --}}


<x-form-item>
    <input placeholder="{{ __('Ваше имя') }}" name="title" class="form-control" autofocus> 
</x-form-item>

@if($errors->has('title'))
    <div class="small text-danger pt-1">
        Поле должно быть заполнено! 
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

    <input name="published_at" type="hidden">
    


<x-button>Отправить комментарий</x-button>
    
</x-form>




