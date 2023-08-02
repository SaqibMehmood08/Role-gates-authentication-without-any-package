<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/role', function () {
//     $user=Auth::user();
//     if($user->hasRole('editor')){
//       dd('success have role editor');

//     };
//     return view('welcome');
// });
Route::group(['middleware'=>'role:editor'],function(){


    //route only access user with role editor

    Route::get('/role', function () {
        $user=Auth::user();
        if($user->hasRole('editor')){
          dd('success have role editor');
    
        };
    });


});