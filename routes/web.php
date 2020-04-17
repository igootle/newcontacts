<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

// Route::get('/contacts', 'ContactController@index')->name('contacts.index');

// Route::post('/contacts', 'ContactController@store')->name('contacts.store');

// Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

// Route::get('/contacts/{contact}', 'ContactController@show')->name('contacts.show');

// Route::put('/contacts/{contact}', 'ContactController@update')->name('contacts.update');

// Route::delete('/contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy');

// Route::get('/contacts/{contact}/edit', 'ContactController@edit')->name('contacts.edit');

//  Route::resource('/contacts', 'ContactController')->parameters([
//    'contacts'=> 'kontak',
//  ]);
//   Route::resource('/contacts', 'ContactController')->names([
//    'index'=> 'contacts.all',
//    'show' => 'contacts.view'
//  ]);
//  Route::resource('/companies.contacts', 'ContactController');

//  Route::resource('/contacts', 'ContactController')->only(['create', 'store', 'edit', 'update', 'destroy']);
//  Route::resource('/contacts', 'ContactController')->except(['create', 'store', 'edit', 'update', 'destroy']);
// Route::resource('/companies', 'CompanyController');
Route::resources([
  '/contacts' => 'ContactController',
  '/companies' => 'CompanyController'
]);

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
