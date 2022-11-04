<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('/admin')->namespace('App\Controllers\Admin')->group(function(){
//Admin login Route
Route::match(['get','post'],'login',[AdminController::class,'login']);

//admin update password
Route::match(['get','post'],'update_admin_password',[AdminController::class,'updateadminpassword']);


Route::group(['middleware'=>['admin']],function(){
//Admin dashboard Route
Route::get('dashboard',[AdminController::class,'dashboard']);

// logout route     
// Route::get('check-admin-password',[AdminController::class,'updateAdminTable']);


// logout route     
Route::get('logout',[AdminController::class,'logout']);


});
});
