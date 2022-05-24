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
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Reports\ReportTypeController;

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

Route::get('/tests', function () {
    $report = App\Models\Report\Report::where("title","Report 01")->first();
    if ( is_null($report) ) {
        $report = App\Models\Report\Report::createNew("Report 01", App\Models\Report\ReportType::first(), "");
        $report->addDynamicAttribute("Att Dyn. 01", App\Models\DynamicAttributes\DynamicAttributeType::find(1)->first(), "");
        $report->latestDynamicattribute->addValue("Test for Add value xxx 1", true);
        $report->addDynamicAttribute("Att Dyn. 02", App\Models\DynamicAttributes\DynamicAttributeType::find(2)->first(), "");
        $report->latestDynamicattribute->addValue("241");
        $report->addDynamicAttribute("Att Dyn. 02", App\Models\DynamicAttributes\DynamicAttributeType::find(4)->first(), "");
        $report->latestDynamicattribute->addValue("0");

        $report->dynamicattributes[0]->addValue("Test for the new row", true);
    }
    //$report->dynamicattributes[0]->addValue("Test for the latest row", true);
    //dd($report->latestDynamicattribute());
    //$report->latestDynamicattribute()->addValue("Test for Add value xxx 1", true);
    //dd($report->oldestDynamicattribute->hasdynamicattribute->latestDynamicvaluerow);
    dd($report);
    $first_report = App\Models\Report\Report::first();
    dd("first_report: ", $first_report, $first_report->dynamicattributes, $first_report->dynamicattributes[0]->values());
});

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


/*
|--------------------------------------------------------------------------
| Report (Admin IT) Routes
|--------------------------------------------------------------------------
|
|
*/
Route::resource('reporttypes',ReportTypeController::class)->middleware('auth');
Route::resource('reports',ReportController::class)->middleware('auth');
