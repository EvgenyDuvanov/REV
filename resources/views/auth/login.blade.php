@extends('layouts.base')

{{-- можно передать вторым значением без закрытия секции --}}
@section('page.title')
    Страница входа в админку
@endsection

@section('content')

   <section>
        <x-container>
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                        <x-card>

                            <x-card-header>
                                <x-card-title>
                                    {{ __('Вход') }}
                                </x-card-title>
                            </x-card-header>

                            <x-card-body>
                                <x-form action="{{ route('login.store') }}" method="POST">
                                @csrf
                                    <x-form-item>
                                        <label>Email</label>
                                        <input placeholder="{{ __('Логин') }}" type="text" name="email" class="form-control">

                                        @error('email')
                                        <p class="">Ошибка логина</p>
                                        @enderror
                                    </x-form-item>
                
                                    <x-form-item>
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="{{ __('Пароль') }}">

                                        @error('password')
                                        <p class="">Ошибка пароля</p>
                                        @enderror
                                    </x-form-item>
    
                                    <x-button>
                                        {{ __('Войти') }}
                                    </x-button>
                                </x-form>
                            </x-card-body>
                        </x-card>
                </div>
            </div>
        </x-container>
   </section>
@endsection


