<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainBeritaController;

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
    return view('welcome');
});

Route::post('/upload', [MainBeritaController::class, 'store']);
// Route::get('/', [MainBeritaController::class, 'index']);
Route::get('get/{file_name}', [MainBeritaController::class, 'downloadFile'])->name('downloadFile');;

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login','dashboard.admin.login') ->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        //Berita
        Route::get('/berita', [MainBeritaController::class,'index'])->name('berita');
        Route::get('/add-berita', [MainBeritaController::class,'add'])->name('add_berita');
        Route::post('/store-berita', [MainBeritaController::class, 'store'])->name('store_berita');
        Route::get('/edit-berita/{id}', [MainBeritaController::class, 'edit'])->name('edit_berita');
        Route::patch('/update-berita/{id}', [MainBeritaController::class, 'update'])->name('update_berita');
        Route::get('/delete-berita/{id}', [MainBeritaController::class, 'destroy'])->name('delete_berita');
        Route::get('/delete-berita/{id}/{filename}', [MainBeritaController::class, 'destroyFile'])->name('delete_file');

        
        
        // Alert::warning('Are you sure?', 'This record and it`s details will be permanantly lost if updated!');
        // Route::post('/upload', [MainBeritaController::class, 'upload']);
    }); 

});