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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\EmployeeController::class, 'employees']);
Route::post('/add-employee', [App\Http\Controllers\EmployeeController::class, 'addEmployee']);
Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'Edit']);
Route::put('/update-employee', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/delete-employee', [App\Http\Controllers\EmployeeController::class, 'destroy']);
Route::delete('/delete-multiple-employee', [App\Http\Controllers\EmployeeController::class, 'deleteMultipleRecoeds']);
