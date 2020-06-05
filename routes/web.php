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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('departments', 'DepartmentController');

Route::resource('income', 'IncomeController');

Route::resource('expense', 'ExpenseController');

Route::resource('/user/dashboard', 'DashboardController');

Route::get('/admin', 'AdminController@index');

Route::resource('profile', 'ProfileController');


Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');

//Route::post('profile', 'ProfileController@update_profile_img');

//Route::post('profile/save', 'ProfileController@save')->name('profile.store');


