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

Route::get('/', function () {
   
    return view('welcome');
});


// Route::get('login', 'WelcomeController@login');

Route::post('/login', 'WelcomeController@login');

Route::get('/zaposleni/{id}', 'ZaposleniController@view');

Route::post('/zaposleniZahtevZaOdmorom', 'ZaposleniController@zahtevZaOdmorom');

// Route::get('zaposleni/{id}', function ($id) {
//     return 'User '.$id;
// });
