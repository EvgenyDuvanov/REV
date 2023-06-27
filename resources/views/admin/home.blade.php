@extends('admin.layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Админка
@endsection

@section('content')
    <x-card>
        <p class="h3 mt-2">
            Добро пожаловать в панель администратора
        </p>  
    </x-card>
@endsection