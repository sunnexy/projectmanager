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

Route::get('/', 'HomeController@index');



Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@login')->name('login');
Route::post('/login', 'SessionsController@store');


Route::middleware(['auth'])->group(function (){
    Route::get('/logout', 'SessionsController@logout');
    Route::get('/profile', 'HomeController@profile')->name('home');
    Route::post('/profile', 'HomeController@store')->name('myuploadurl');
    Route::post('/profile-update', 'HomeController@update')->name('update');

    Route::resource('companies', 'CompaniesController');
    Route::get('projects/create/{company_id?}', 'ProjectsController@create');
    Route::post('projects/addUser', 'ProjectsController@addUser')->name('projects.addUser');
    Route::resource('projects', 'ProjectsController');
    Route::resource('roles', 'RolesController');
    Route::get('tasks/create/{company_id?}/{project_id?}', 'TasksController@create');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');
    Route::get('/admin/companies', 'AdminController@companies')->name('companies.all');
    Route::get('/admin/projects', 'AdminController@projects')->name('projects.all');
    Route::get('/admin/tasks', 'AdminController@tasks')->name('tasks.all');
});