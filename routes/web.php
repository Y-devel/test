<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('admin.test');
});
Route::get('/file', function (Request $request) {
    //php artisan storage:link
    //https://gist.github.com/no4ch/ebab2b99c3a7b46ddc8a1d8714496bbe
    //Storage::disk('local')->put('public/file1.txt', 'Contents');
    return view('file');
});
Route::post('/file', function (Request $request) {
    var_dump($request->file);
    $path = Storage::putFile('news', $request->file);
    var_dump($path);
    return view('file');
})->name('file');

//Роуты админ продукты
Route::get('/home', [CategoriesController::class, 'listAdmin'])->name('categories_admin');
Route::get('/product-add', [CategoriesController::class, 'viewAddForm'])->name("add-product");
Route::post('/product-add', [CategoriesController::class, 'add'])->name("add-product");
Route::get('/product-add/{id}', [CategoriesController::class, 'viewEditForm'])->name("edit-product");
Route::post('/product-add/{id}', [CategoriesController::class, 'edit'])->name("save-product");
Route::post('/delete-product', [CategoriesController::class, 'delete'])->name("delete-products");

//Роуты админ новостей
Route::get('/news-admin', [NewsController::class, 'listAdmin'])->name('news_admin');
Route::get('/news-add', [NewsController::class, 'show']);
Route::get('/news-add/{id}', [NewsController::class, 'editShow'])->name('edit');
Route::post('/news-add/{id}', [NewsController::class, 'store']);
Route::post('/news-add', [NewsController::class, 'add'])->name('news-save');
Route::post('/delete-news', [NewsController::class, 'delete'])->name('delete-news');

//Роуты авторизации
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/destroy', [LoginController::class, 'destroy'])->name(name: 'destroy');;
