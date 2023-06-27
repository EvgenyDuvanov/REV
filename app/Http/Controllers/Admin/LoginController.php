<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class LoginController extends Controller
{
    // public function index()
    // {
    //     return view('admin.login.index');
    // }

    // public function store(Request $request)
    // {
    //     $request->validated([
    //         "email" => ["required", "email", "string", "unique"],
    //         "password" => ["required", "password", "string"],

    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     $remember = $request->boolean('remember');
   
    //     dd($email, $password, $remember);

    //     return 'Запрос на вход'; //admin.login.store
    // }


    // Отображение формы входа
    public function index()
    {
        return view('admin.login.index');
    }



    // Обработка отправки формы входа
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect()->route('admin.cabinet');
        } else {
            // Неверные учетные данные
            return back()->withErrors([
                'email' => 'Неверный адрес электронной почты или пароль.',
            ]);
        }
    }



    // Выход из системы
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }


}
