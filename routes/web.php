<?php

use App\Models\Guru;
use App\Models\User;
use App\Models\Berita;
use App\Imports\GurusImport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MainBeritaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserManagementController;

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

// Route::get('/index', [WelcomeController::class, 'index']);

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/detail-berita/{id}', [WelcomeController::class, 'detailBerita'])->name('detail_berita');
Route::get('/search', [WelcomeController::class, 'search'])->name('search');

Route::post('/upload', [MainBeritaController::class, 'store']);
Route::get('get/{file_name}', [MainBeritaController::class, 'downloadFile'])->name('downloadFile');

Auth::routes();

Route::prefix('operator')->name('operator.')->group(function(){
    Route::middleware(['auth:web,admin','PreventBackHistory'])->group(function(){
        Route::get('/detail-berita/{id}', [MainBeritaController::class,'viewDetail'])->name('detail_berita');
        //Data Guru
        Route::get('/guru',[GuruController::class, 'index'])->name('guru');
        Route::get('/add-guru', [GuruController::class,'create'])->name('add_guru');
        Route::post('/store-guru', [GuruController::class, 'store'])->name('store_guru');
        Route::get('/detail-guru/{id}', [GuruController::class,'show'])->name('detail_guru');
        Route::get('/edit-guru/{id}', [GuruController::class, 'edit'])->name('edit_guru');
        Route::patch('/update-guru/{id}', [GuruController::class, 'update'])->name('update_guru');
        Route::get('/delete-guru/{id}', [GuruController::class, 'destroy'])->name('delete_guru');
        Route::get('/delete-all-guru', [GuruController::class, 'destroyAll'])->name('deleteAll_guru');
        Route::get('/data-guru', function() {
            return DataTables::of(Guru::query())
            ->addColumn('action', 'dashboard.guru.action')
            ->make(true);
        })->name('data_guru');
        Route::get('file-export', [GuruController::class, 'fileExport'])->name('file_export');
    });
});

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('/home',[UserController::class, 'index'])->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        //Profile
        Route::get('/profile',[UserController::class, 'show'])->name('profile');
        Route::patch('/save-profile/{id}',[UserController::class, 'changeProfile'])->name('changeProfile');
        Route::patch('/change-password/{id}',[UserController::class, 'changePassword'])->name('changePassword');

    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[AdminController::class, 'index'])->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::post('/file-import', [AdminController::class, 'fileImport'])->name('file_import');

        //User Management
        Route::get('/user-management',[UserManagementController::class, 'index'])->name('userManagement');
        Route::get('/add-user', [UserManagementController::class,'create'])->name('add_user');
        Route::post('/store-user', [UserManagementController::class, 'store'])->name('store_user');
        Route::get('/detail-user/{id}', [UserManagementController::class,'show'])->name('detail_user');
        Route::get('/edit-user/{id}', [UserManagementController::class, 'edit'])->name('edit_user');
        Route::patch('/update-user/{id}', [UserManagementController::class, 'update'])->name('update_user');
        Route::get('/delete-user/{id}', [UserManagementController::class, 'destroy'])->name('delete_user');
        Route::get('/data-user', function() {
            return DataTables::of(User::join('kota','users.kota', '=', 'kota.id')->get(['users.*', 'kota.nama_kota']))
                ->addColumn('action', 'dashboard.userManagement.action')
                ->make(true);
        })->name('data_user');
        Route::post('/get-kota', [UserManagementController::class, 'getKota'])->name('get_kota');

        //Profile
        Route::get('/profile',[AdminController::class, 'show'])->name('profile');
        Route::patch('/save-profile/{id}',[AdminController::class, 'changeProfile'])->name('changeProfile');
        Route::patch('/change-password/{id}',[AdminController::class, 'changePassword'])->name('changePassword');
        
        //Berita
        Route::get('/berita', [MainBeritaController::class,'index'])->name('berita');
        Route::get('/add-berita', [MainBeritaController::class,'add'])->name('add_berita');
        Route::post('/store-berita', [MainBeritaController::class, 'store'])->name('store_berita');
        Route::get('/edit-berita/{id}', [MainBeritaController::class, 'edit'])->name('edit_berita');
        Route::patch('/update-berita/{id}', [MainBeritaController::class, 'update'])->name('update_berita');
        Route::get('/delete-berita/{id}', [MainBeritaController::class, 'destroy'])->name('delete_berita');
        Route::get('/delete-berita/{id}/{filename}', [MainBeritaController::class, 'destroyFile'])->name('delete_file');
    }); 

});