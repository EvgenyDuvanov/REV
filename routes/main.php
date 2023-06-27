<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;



//аутконтроллер для входа в админку
Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login'); // форма входа
Route::post('login', [AuthController::class, 'store'])->name('login.store'); // запрос отправки формы на вход
Route::post('logout', [AuthController::class, 'logout'])->name('logout'); //выход из ЛК




Route::view('/', 'home.index')->name('home');   //  упрощение в одну строчку
Route::redirect('/home', '/'); //  редир на гл страницу

Route::get('blog', [BlogController::class, 'index'])->name('blog');//контроллер для блога - включающий в себя посты
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');


// Route::get('blog/{post}/comments/create', [CommentController::class, 'create'])->name('blog.comments.create');  // создание поста - РАБОТАЕТ, но не нужен(создание на странице шоу)


Route::get('blog/{post}/store', [CommentController::class, 'create'])->name('blog.comments');  // создание поста - РАБОТАЕТ
Route::post('blog/comments/store', [CommentController::class, 'store'])->name('blog.comments.store'); //запрос на отправку комментария после его создания




Route::fallback(function () {  // на несуществующий маршрут вывод
    return'Fallback'; 
});


