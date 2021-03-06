<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ExecutionController;
use App\Http\Controllers\GradeUnitController;
use App\Http\Controllers\SubSubjectController;
use App\Http\Controllers\DifficultyController;
use App\Http\Controllers\AppreciationController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    if (Auth::check()) {
        return view('admin02');
    }
    return redirect('/login');
});

Route::get('/home', function () {
    if (Auth::check()) {
        return view('admin02');
    }
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('subjects',SubjectController::class)->middleware('auth');
Route::resource('subsubjects',SubSubjectController::class)->middleware('auth');
Route::get('/subject/fetch', [SubjectController::class, 'fetch'])->name('subject.fetch');

Route::resource('categories',CategoryController::class)->middleware('auth');
Route::resource('tasks',TaskController::class)->middleware('auth');
Route::resource('subtasks',SubTaskController::class)->middleware('auth');

Route::resource('comments',CommentController::class)->middleware('auth');
Route::match(['put', 'patch'],'comments/remove/{comment}', [CommentController::class, 'remove'])
    ->name('comments.remove')
    ->middleware('auth');

Route::resource('difficulties',DifficultyController::class)->middleware('auth');
Route::post('difficulties/add', [DifficultyController::class, 'add'])
    ->name('difficulties.add')
    ->middleware('auth');

Route::resource('priorities',PriorityController::class)->middleware('auth');
Route::post('priorities/add', [PriorityController::class, 'add'])
    ->name('priorities.add')
    ->middleware('auth');

Route::resource('appreciations',AppreciationController::class)->middleware('auth');
Route::post('appreciations/add', [AppreciationController::class, 'add'])
    ->name('appreciations.add')
    ->middleware('auth');

Route::resource('executions',ExecutionController::class)->middleware('auth');
Route::post('executions/add', [ExecutionController::class, 'add'])
    ->name('executions.add')
    ->middleware('auth');

Route::resource('gradeunits',GradeUnitController::class)->middleware('auth');
