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

Route::get('/', 'companiesController@index')->middleware('auth');


//==========  marketing  =========
Route::get('sponsors', 'SponsoreController@index')->middleware('auth');
Route::post('add', 'SponsoreController@add')->middleware('auth');
Route::get('delete-sponsor/{id}', 'SponsoreController@delete')->middleware('auth');
Route::post('edit-sponsor/{id}', 'SponsoreController@edit')->middleware('auth');
Route::get('edit-sponsor/{id}', 'SponsoreController@edit')->middleware('auth');



//==========  marketing  =========
Route::get('marketing', 'market@index')->middleware('auth');
Route::post('addmarketting', 'market@addmarket')->middleware('auth');
Route::get('delete_markett/{id}', 'market@delete_market')->middleware('auth');
Route::post('edit_markett/{id}', 'market@edit_market')->middleware('auth');
Route::get('edit_markett/{id}', 'market@edit_market')->middleware('auth');




//==========  employee  =========
Route::get('employees', 'employees@index')->middleware('auth');
Route::post('addmarket', 'employees@addmarket')->middleware('auth');
Route::get('delete_market/{id}', 'employees@delete_market')->middleware('auth');
Route::post('edit_market/{id}', 'employees@edit_market')->middleware('auth');
Route::get('edit_market/{id}', 'employees@edit_market')->middleware('auth');




//==================Career Route =========================
Route::get('careers', 'careers@index')->middleware('auth');
Route::post('addcareer', 'careers@addcareer')->middleware('auth');
Route::get('delete_career/{id}', 'careers@delete_career')->middleware('auth');
Route::post('edit_career/{id}', 'careers@edit_career')->middleware('auth');
Route::get('edit_career/{id}', 'careers@edit_career')->middleware('auth');

//=================== End Career Route ===================
Route::get('jobs', 'jobs@index')->middleware('auth');
Route::post('addjobs', 'jobs@addjobs')->middleware('auth');
Route::get('delete_jobs/{id}', 'jobs@delete_jobs')->middleware('auth');
Route::get('edit_jobs/{id}', 'jobs@edit_jobs')->middleware('auth');
Route::post('edit_jobs/{id}', 'jobs@edit_jobs')->middleware('auth');

//===================  companies Route ===================
Route::resource('companies', 'companiesController')->middleware('auth');

//==================guide Route =========================
Route::get('/guide', 'guide@index')->middleware('auth');
Route::get('/addcompany/{id}', 'guide@addcompany')->middleware('auth');
Route::get('/delete_company/{id}/{cat_id}', 'guide@delete_company')->middleware('auth');
Route::get('/edit_company/{id}/{cat_id}', 'guide@edit_company')->middleware('auth');
Route::post('/edit_company/{id}', 'guide@edit_company')->middleware('auth');
Route::post('/addcompany/{id}', 'guide@addcompany')->middleware('auth');

//===================  Users Route ===================
Route::resource('users', 'UserController')->middleware('auth');

//===================  Phones Route ===================
Route::resource('phones', 'phones')->middleware('auth');
  
//===================  employees Route ===================
//Route::resource('employees', 'employeesController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//===================  companies Route ===================
Route::post('editCompany/{id}', 'companiesController@editCompany')->middleware('auth');
Route::get('editCompany/{id}', 'companiesController@editCompany')->middleware('auth');
Route::get('companies', 'companiesController@index')->middleware('auth');
Route::get('delete/{id}', 'companiesController@delete')->middleware('auth');
Route::post('addCompany', 'companiesController@addCompany')->middleware('auth');
Route::get('show/{id}', 'companiesController@showDetails')->middleware('auth');