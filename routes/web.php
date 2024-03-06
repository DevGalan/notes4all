<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/notes');
Route::redirect('/index', '/notes');

Route::get('/notes', [NotesController::class, 'index']);

Route::get('/notes/{id}/show', [NotesController::class, 'show']);

Route::get('/notes/new', [NotesController::class, 'new']);

Route::post('/notes', [NotesController::class, 'create']);

Route::get('/notes/{id}/edit', [NotesController::class, 'edit']);

Route::put('/notes', [NotesController::class, 'update']);

Route::delete('/notes/{id}/delete', [NotesController::class, 'delete']);

// Route::post('/notes', function () { TODO
    // $note = new \App\Models\Note();
    // $note->title = request('title');
    // $note->description = request('description');
    // $note->save();
//     return ;
// })

// Route::get('/notes/delete/{id}', function ($id) {
    // return view('note-delete') . ' ' . $id;
// })



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
