<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

Auth::routes();

Route::get('/', [PagesController::class, 'HomeController'])->name('home');
Route::get('/contacts', [PagesController::class, 'ContactController'])->name('contact');
Route::get('/abouts', [PagesController::class, 'AboutController'])->name('about');
Route::get('/forums', [PagesController::class, 'ForumController'])->name('forum');
Route::get('/donate', [PagesController::class, 'DonateController'])->name('donate');


Route::middleware(['auth', 'admin.panel'])->group(function () {
    Route::get('/adminpanels', [AdminController::class, 'AdminIndex'])->name('admin.home');
    Route::get('/adminpanels/galaxyposts', [AdminController::class, 'AdminPosts'])->name('admin.posts');
    Route::get('/adminpanels/galaxyusers', [ProfileController::class, 'ProfileIndexController'])->name('admin.profile');
    Route::patch('/adminpanels/galaxyusers/{user:id}', [ProfileController::class, 'ProfileUpdateController'])->name('admin.profile.update');
    Route::delete('/adminpanels/galaxyusers/{user:id}', [ProfileController::class, 'ProfileDestroyController'])->name('admin.profile.delete');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{user:user_url}', [ProfileController::class, 'ProfileShowController'])->name('profile.show');
    Route::patch('/profile/{user:user_url}', [ProfileController::class, 'UserUpdateProfileController'])->name('profile.edit');
});
