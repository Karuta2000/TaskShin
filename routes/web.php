<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Oauth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;

use Livewire\Livewire;



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
    // Your code to check if the request is from the host
    if (request()->getHost() === 'localhost:8000') {
        return view('homepage');
    }

    return redirect()->route('dashboard');
});


Route::middleware(['auth'])->group(function () {
    // Only authenticated users can access these routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    require __DIR__ . '/auth.php';

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

    Route::middleware('auth')->group(function () {
        Route::get('/user/settings', [UserController::class, 'showSettings'])->name('user.settings');
        Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    });

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/find', [ProjectController::class, 'search'])->name('projects.search');
    Route::get('/projects/create',  [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects',  [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}',  [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit',  [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');


    Route::get('/auth/google', 'App\Http\Controllers\Oauth\LoginController@redirectToGoogle')->name('login.google');
    Route::get('/auth/google/callback', 'App\Http\Controllers\Oauth\LoginController@handleGoogleCallback');


    Route::get('/notes', [NoteController::class, 'index'])->name('notes');
    Route::get('/notes/create',  [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes',  [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}',  [NoteController::class, 'show'])->name('notes.show');
    Route::get('/notes/{note}/edit',  [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tags/create',  [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags',  [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}',  [TagController::class, 'show'])->name('tags.show');
    Route::get('/tags/{tag}/edit',  [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/tags', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

    Route::post('/tags/{project}',  [TagController::class, 'attachTagsToProject'])->name('tags.attachToProject');
});
