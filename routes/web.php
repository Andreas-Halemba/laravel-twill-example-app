<?php

use App\Reports\ChangesDonePerPage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;

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
    return view('welcome');
});

Route::get('reports/pages', function () {
    $report = new ChangesDonePerPage(
        Period::create(Carbon::now()->subMinutes(5), Carbon::now())
    );

    return response()->json($report->allChanges()->toArray());
});
