<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categories = Category::all()->sortBy("title");
    $posts = Post::all()->sortByDesc("created_at");
    return view('home', [
        'categories' => $categories,
        'posts' => $posts
    ]);
});

Route::get('about/', function () {
    return view('about');
});



// post routes

Route::get('posts/all', [PostsController::class, 'index'])->name('all_posts');

Route::get('posts/add', [PostsController::class, 'create'])->name('create_post');

Route::post('posts/create', [PostsController::class, 'add'])->name('add_post');

Route::get('posts/show/{id}', [PostsController::class, 'show'])->name('show_post');



// categories

Route::get('categories/all', [CategoryController::class, 'index'])->name('all_categories');

Route::get('categories/add', [CategoryController::class, 'create'])->name('create_category');

Route::post('categories/save', [CategoryController::class, 'save'])->name('save_category');

Route::get('categories/show/{id}', [CategoryController::class, 'show'])->name('show_category');



// user related routes

Route::get('logout/', [LogoutController::class, 'index'])-> name('logout');

Route::get('login/', [LoginController::class, 'index'])-> name('login');

Route::post('login/', [LoginController::class, 'login']);

Route::get('register/user', [RegisterController::class, 'index'])-> name('register');

Route::post('register/user/create', [RegisterController::class, 'create_user'])->name('create_user');

Route::get('register/specialist', [RegisterController::class, 'specialist_register'])-> name('register_specialist');

Route::post('register/specialist/create', [RegisterController::class, 'create_specialist'])->name('create_specialist');

Route::get('register/admin', [RegisterController::class, 'admin_register'])-> name('register_admin');

Route::post('register/admin/create', [RegisterController::class, 'create_admin'])->name('create_admin');

Route::get('profile/', [UsersController::class, 'index'])-> name('profile');

Route::get('profile/edit', [UsersController::class, 'edit'])-> name('profile_edit');
