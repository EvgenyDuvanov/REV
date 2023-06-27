<?

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

//добавить мидлвеер на вход
Route::prefix('admin')->group(function() {

    //форма входа в админку 
    Route::middleware('guest')->group(function() {
        Route::get('login', [LoginController::class, 'index'])->name('admin.login'); // форма входа
        Route::post('login', [LoginController::class, 'store'])->name('admin.login.store'); // запрос отправки формы на вход
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout'); //выход из ЛК
    }); 
});



// Route::prefix('admin')->middleware('auth')->group(function() {
Route::prefix('admin')->group(function() {

    Route::get('blog', [BlogController::class, 'index'])->name('admin.blog');//контроллер для блога - включающий в себя посты
    Route::get('blog/{post}', [BlogController::class, 'show'])->name('admin.blog.show');
    
    Route::get('comments', [CommentController::class, 'index'])->name('admin.comments'); //список новых комментов
    Route::get('comments/{comment}', [CommentController::class, 'show'])->name('admin.comments.show');   
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');//изменение новых комментариев
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');      // запрос на обновление после изменения статуса
    Route::delete('comments/{comment}', [CommentController::class, 'delete'])->name('admin.comments.delete');   // удаление поста


    Route::redirect('/', '/admin/posts')->name('admin'); // редирект при входе в админку
    

    Route::get('cabinet', [AdminController::class, 'index'])->name('admin.cabinet');  // домашняя страница админа
    
    
    Route::get('posts', [PostController::class, 'index'])->name('admin.posts');                 // просмотр поста
    Route::get('posts/create', [PostController::class, 'create'])->name('admin.posts.create');  // создание поста
    Route::post('posts/store', [PostController::class, 'store'])->name('admin.posts.store');    // запрос на сохранение после создания
    Route::get('posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');          // просмотр одного поста
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');     // изменение поста
    Route::put('posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');      // запрос на обновление после внесения изменений
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('admin.posts.delete');   // удаление поста
});