<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Designation\DesignationController;

use App\Models\Designation as Designation;
use App\Models\Employee as Employee;


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
    $designationCount = Designation::count();
    $empCount = Employee::count();
    return view('welcome', compact('designationCount', 'empCount'));
});

Route::resource('employee', EmployeeController::class);

Route::resource('designation', DesignationController::class);



