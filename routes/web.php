<?php

use App\Models\User;
use Illuminate\Pagination\Paginator;
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
    return ['Laravel' => app()->version()];
});
Route::get('/test', function () {
    $users = User::paginate(10);

    // return $users->links();
    // $paginator = new Paginator();

    // return $paginator->onFirstPage();

    // return view('test', compact('users'));
    return view('test', compact('users'));
});



require __DIR__.'/auth.php';
