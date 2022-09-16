<?php

use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::controller(AuthController::class)->group(function(){
    Route::get('admin/logout','destroy')->name('admin.logout');
    Route::get('admin/profile','Profile')->name('admin.profile');
    Route::get('admin/editProfile','EditProfile')->name('admin.editProfile');
    Route::post('store/profile', 'storeProfile')->name('store.profile');
    
    Route::get('admin/login','create')->name('admin.login');
    Route::get('admin/register','register_create')->name('admin.register');

});