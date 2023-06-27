<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Oauth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ImageController;

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
    if(Auth::id() == null){
        return view('homepage');
    }
    else {
        return redirect('/dashboard');
    }

});
Route::get('/changelog', function () {
    // Your code to check if the request is from the host
    return view('changelog');
});

require __DIR__ . '/auth.php';

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    // Only authenticated users can access these routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/gallery', [ImageController::class, 'index'])->name('gallery');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes');


    Route::get('/user/settings/user', [UserController::class, 'showUserSettings'])->name('user.settings.user');
    Route::get('/user/settings/password', [UserController::class, 'showPasswordSettings'])->name('user.settings.password');
    Route::get('/user/settings/profile', [UserController::class, 'showProfileSettings'])->name('user.settings.profile');
    Route::get('/user/settings/avatar', [UserController::class, 'showAvatarSettings'])->name('user.settings.avatar');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/update/password', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::put('/user/update/profile', [UserController::class, 'updateProfile'])->name('user.update.profile');
    Route::put('/user/update/avatar', [UserController::class, 'updateAvatar'])->name('user.update.avatar');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');

    Route::prefix('projects')->group(function (){
        Route::get('/', [ProjectController::class, 'index'])->name('projects');
        Route::get('/find', [ProjectController::class, 'search'])->name('projects.search');
        Route::get('/create',  [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/',  [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project}',  [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/{project}/edit',  [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    Route::post('/tags/{project}',  [TagController::class, 'attachTagsToProject'])->name('tags.attachToProject');
});

