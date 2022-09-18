<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeSliderController;
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
    return view('fronted.index');
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

    Route::get('change/password','ChangePassword')->name('change.password');
    Route::post('update/password', 'UpdatePassword')->name('update.password');


});

Route::controller(HomeSliderController::class)->group(function(){
    Route::get('home/slider','HomeSlider')->name('home.slider');
    Route::post('update/slider','UpdateSlider')->name('update.slider');

    
});