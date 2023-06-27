<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()//форма входа
    {
        return view('auth.login');
    }

    public function store(Request $request)//запрос на вход
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('admin.cabinet');
        }

        return redirect()->route('auth.login')->withErrors(["email" => "Неправильный email или пароль"]);
    }
}
