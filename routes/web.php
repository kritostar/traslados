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

//Route::get('/', 'PagesController@getHome');

//Route::get('/messages', 'MessagesController@getMessages');

//Route::post('/submit', 'MessagesController@submit');

Route::get('/', 'TramitesController@home');

Route::get('/login', 'LDAPController@login');
Route::post('/login', 'LDAPController@log_user');

Route::get('/tramite/alta', 'TramitesController@alta');
Route::post('/tramite/alta', 'TramitesController@submit');

Route::get('/tramite/{id_tramite}/ver', 'TramitesController@ver');
Route::get('/tramite/{id_tramite}/pdf', 'TramitesController@pdf');
Route::post('/tramite/{id_tramite}/ver', 'TramitesController@submit_medico');

Route::get('/tramite/{id_tramite}/auditar', 'TramitesController@auditar');
Route::post('/tramite/{id_tramite}/auditar', 'TramitesController@submit_auditor');

Route::get('/tramite/{id_tramite}/eliminar', 'TramitesController@eliminar');
Route::post('/tramite/{id_tramite}/eliminar', 'TramitesController@submit_eliminar');

Route::get('/ws/abewsvalidaafi', 'WebserviceController@abewsvalidaafi');
Route::post('/ws/abewsvalidaafi', 'WebserviceController@abewsvalidaafi');

Route::get('/select2-autocomplete-ajax', 'TramitesController@dataAjax');