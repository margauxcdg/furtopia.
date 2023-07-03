<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/petgallery', [App\Http\Controllers\PetController::class, 'index'])->name('petgallery');
Route::get('/petgallery', [App\Http\Controllers\PetController::class, 'index'])->name('petgallery.index');
Route::get('/petgallery/post', [App\Http\Controllers\PetController::class, 'create'])->name('post');
Route::post('/petgallery/store', [App\Http\Controllers\PetController::class,'store'])->name('store');
Route::post('/home/pets/{id}/like', [App\Http\Controllers\PetController::class,'like'])->name('pets.like');
Route::get('/home/pets/{id}', [App\Http\Controllers\PetController::class,'show'])->name('profile');
Route::get('/home/searchresults', [App\Http\Controllers\PetController::class,'search'])->name('searchresults');
Route::get('/petgallery/edit/{id}', [App\Http\Controllers\PetController::class, 'edit'])->name('edit');
Route::post('/petgallery/update/{id}', [App\Http\Controllers\PetController::class, 'update'])->name('update');
Route::delete('/petgallery/delete/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('delete');

Route::get('/petcare', [App\Http\Controllers\PetCareController::class, 'index'])->name('petcare');
Route::get('/petcare/addArticle', [App\Http\Controllers\PetCareController::class, 'create'])->name('addArticle');
Route::post('/petcare/storeArticle', [App\Http\Controllers\PetCareController::class,'store'])->name('storeArticle');
Route::get('/petcare/{id}', [App\Http\Controllers\PetCareController::class, 'show'])->name('article');
Route::delete('/petcare/deleteArticle/{id}', [App\Http\Controllers\PetCareController::class, 'destroy'])->name('deleteArticle');
Route::get('/petcare/editArticle/{id}', [App\Http\Controllers\PetCareController::class, 'edit'])->name('editArticle');
Route::post('/petcare/updateArticle/{id}', [App\Http\Controllers\PetCareController::class, 'update'])->name('updateArticle');
Route::get('/petcare/searchpetcare', [App\Http\Controllers\PetCareController::class,'search'])->name('searchpetcare');

Route::get('/home/adoptForm/{pet_id}', [App\Http\Controllers\PetManagementController::class, 'show'])->name('adoptForm'); 
Route::post('/home/adoptForm/{pet_id}/store', [App\Http\Controllers\PetManagementController::class, 'store'])->name('adoptForm.store');
Route::get('/petmanagement', [App\Http\Controllers\PetManagementController::class, 'index'])->name('petmanagement');
Route::get('/petmanagement/application/{id}', [App\Http\Controllers\PetManagementController::class, 'application'])->name('application');
Route::post('/petmanagement/application/{id}/approve', [App\Http\Controllers\PetManagementController::class, 'approveApplication'])->name('approveApplication');
Route::post('/petmanagement/application/{id}/decline', [App\Http\Controllers\PetManagementController::class, 'declineApplication'])->name('declineApplication');


Route::get('/message', [App\Http\Controllers\MessageController::class, 'index'])->name('message');






Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'getNotifications'])->name('notifications');








Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [App\Http\Controllers\MessageController::class, 'create'])->name('messages.create');
Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');












Route::middleware(['auth', 'animal_shelter'])->group(function () {
  
    Route::get('/pet-management', [App\Http\Controllers\PetManagementController::class, 'index'])->name('petmanagement');
});


//Route::get('/posts', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');




