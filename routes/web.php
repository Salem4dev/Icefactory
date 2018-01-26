<?php

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

Route::get('login',"HomeController@login");

Route::get('register',"HomeController@register");
Auth::routes();


Route::group(['middleware'=>'auth'],function(){

/* puplic routes group */

Route::get('/',"HomeController@index");

Route::get('/reset',"HomeController@reset");

Route::get('/factory_expenses',"HomeController@factory_expenses");

Route::get('/maintenance_expenses',"HomeController@maintenance_expenses");

Route::get('/earnings_loses', "HomeController@earnings_loses");

/* employee routes group */

Route::get('employee_info', "EmployeeController@index");
Route::post('employee_info/add', "EmployeeController@add");
Route::post('employee_info/update/{id}', "EmployeeController@update");
Route::post('employee_info/delete/{id}', "EmployeeController@delete");

//Route::resource('employee_info', 'EmployController', [
//    'except' => ['edit', 'create']
//]);

Route::get('/hodor_insraf', "EmployeeController@hodor_insraf");

Route::get('/salary', "EmployeeController@salary");

Route::get('/fixed_assets',"EmployeeController@fixed_assets");

Route::get('/incidental_expenses', "EmployeeController@incidental_expenses");

/* Customer routes group */

Route::get('customer_info', "CustomerController@index");

Route::post('customer_info/add', "CustomerController@add");
Route::post('customer_info/edit/{id}', "CustomerController@edit");
Route::post('customer_info/delete/{id}', "CustomerController@delete");

Route::get('/customer_sales', "CustomerController@customer_sales");

/* Sales routes group */
Route::get('daily_sales', "SalesController@index");
Route::post('daily_sales/add', "SalesController@add");
Route::post('daily_sales/update/{id}', "SalesController@update");
Route::post('daily_sales/delete/{id}', "SalesController@delete");
//Route::post('categories', "SalesController@delete");

//Route::get('/monthly_sales', "SalesController@monthly_sales");
//
//Route::get('/yearly_sales', "SalesController@yearly_sales");

Route::resource('categories', "CategoryController", [
    'except' => ['edit', 'create','show']
]);
Route::resource('products', "ProductController", [
    'except' => ['edit', 'create','show','update']
]);
Route::post('products/update/{id}', "ProductController@update");
/* logout routes group */

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
