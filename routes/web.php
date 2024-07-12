<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('html.home');
})->name('home');


Route::get('/login', function () {
    return view('html.login');
})->name('login');

Route::get('/signup', function () {
    return view('html.signup');
})->name('signup');

Route::get('/front', function () {
    return view('html.front');
})->name('front');



Route::controller(AuthController::class)->group(function () {

    Route::get('/signup',  'displaySignup');
    Route::post('/signup', 'createUser');
    Route::post('/login',  'loginUser');

});

Route::middleware(['auth'])->group(function () {

    Route::controller(ProjectController::class)->group(function () {


        Route::post('/upload', 'uploadProject');
        Route::get('/upload', 'displayUploadForm');
        Route::get('/student', 'studentProjects');
        Route::get('/edit/{project}', 'editProjectForm');
        Route::post('/edit/{project}', 'editProject');


        Route::get('/dashboard', 'lecturerProjects');
        Route::get('/project/{project}', 'viewProjectForm');
        Route::post('/project/{project}', 'changeProjectState');
    });

});



