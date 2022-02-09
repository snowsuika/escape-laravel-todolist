<?php

use App\Http\Controllers\TodosController;
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

Route::prefix('todolist')->group(function () {
    Route::get('/', [TodosController::class, 'index'])->name('todolist');
    Route::post('/', [TodosController::class, 'store'])->name('todolist.create');
    Route::put('/{todo_id}', [TodosController::class, 'update'])->name('todolist.update');
    Route::delete('/{todo_id}', [TodosController::class, 'destroy'])->name('todolist.delete');
});

require __DIR__ . '/auth.php';
