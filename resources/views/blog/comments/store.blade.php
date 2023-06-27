@extends('layouts.main')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Комментарий отрпавлен
@endsection

@section('main.content')

<a href="{{ route('blog') }}">
    Вернуться к постам
</a>

<div class="card mt-3 mb-3"> 

    <h4>
      Ваш комментарий успешно создан, в ближайшее время он появится на сайте!
    </h4>

</div>

@endsection


