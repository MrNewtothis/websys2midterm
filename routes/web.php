<?php 
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get      ('/',               [UserController::class, 'index'])->     name('users.index');
Route::get('/', [UserController::class,'index'])->name('users.index');
Route::post     ('/store',          [UserController::class, 'store'])->     name('users.store');
Route::delete   ('/delete/{id}',    [UserController::class, 'destroy'])->   name('users.destroy');
Route::get      ('/edit/{id}',      [UserController::class, 'edit'])->      name('users.edit');
Route::post     ('/update/{id}',    [UserController::class, 'update'])->    name('users.update');
