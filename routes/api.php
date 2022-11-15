<?php

use App\Http\Controllers\Admin\AdminlistController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\PolloptionController;
use App\Http\Controllers\Admin\UnionController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\User\FollowerController;
use App\Http\Controllers\User\PostlikeController;
use App\Http\Controllers\User\UserprofileController;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->group(function () {
    // Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/users', [AdminlistController::class, 'adminList']);


    Route::apiResource('designations', DesignationController::class);

    // location
    Route::prefix('/location')->group(function () {
        Route::get('/divisions', [DivisionController::class, 'divisionsList']);
        Route::get('/districts', [DistrictController::class, 'districtsList']);
        Route::get('/upazilas', [UpazilaController::class, 'upazilasList']);
        Route::get('/unions', [UnionController::class, 'unionsList']);
    });

    // Organization
    Route::prefix('/organization')->group(function () {
        Route::get('/index', [OrganizationController::class, 'index']);
        Route::post('/store', [OrganizationController::class, 'store']);
        Route::post('/update/{id}', [OrganizationController::class, 'update']);
        Route::post('/destroy/{id}', [OrganizationController::class, 'destroy']);
    });


    // designations
    // Route::prefix('/designation')->group(function () {
    //     Route::get('/index', [AdminlistController::class, 'index']);
    //     Route::post('/store', [AdminlistController::class, 'store']);
    //     Route::post('/update/{id}', [AdminlistController::class, 'update']);
    //     Route::post('/destroy/{id}', [AdminlistController::class, 'destroy']);
    // });

    // Poll
    Route::prefix('/poll')->group(function () {
        Route::get('/index', [PollController::class, 'index']);
        Route::post('/store', [PollController::class, 'store']);
        Route::post('/update/{id}', [PollController::class, 'update']);
        Route::post('/destroy/{id}', [PollController::class, 'destroy']);
    });

    // Poll
    Route::prefix('/poll-option')->group(function () {
        Route::get('/index', [PolloptionController::class, 'index']);
        Route::post('/store', [PolloptionController::class, 'store']);
        Route::post('/update/{id}', [PolloptionController::class, 'update']);
        Route::post('/destroy/{id}', [PolloptionController::class, 'destroy']);
    });
});

Route::prefix('user')->group(function () {

    // user
    Route::prefix('/profile')->group(function () {
        Route::get('/index', [UserprofileController::class, 'index']);
        Route::post('/update/{id}', [UserprofileController::class, 'update']);
    });
    // user
    Route::post('post/like',[PostlikeController::class,'postLike']);

    // follower
    Route::post('follower/{id}',[FollowerController::class,'follower']);

});



// posts
Route::get('posts', [PostController::class, 'index']);
Route::post('post', [PostController::class, 'store']);

// profile
Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'store']);
