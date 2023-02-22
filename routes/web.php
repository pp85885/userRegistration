<?php

use App\Http\Controllers\ManageUser;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ManageUser::class, 'add']);
Route::post('registerUser',[ManageUser::class, 'store']);
Route::get('login',[ManageUser::class, 'login']);
Route::post('login',[ManageUser::class, 'validateUser']);