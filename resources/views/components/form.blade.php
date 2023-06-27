@props(['method' => 'GET'])


{{-- добавляем скрытое поле --}}
@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))


{{-- аппером поднимаем регистр на все методы --}}
<form {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">


    {{-- если не ГЕТ и не ПОСТ, тогда  --}}

     @unless($_method)

        @method($method)
    {{-- <input type="hidden" name="_method" method="{{ $method }}"> --}}
   
    @endunless

{{-- защита от атаки, при отправке ПОСТ --}}
    @csrf {{ $slot }}
</form>