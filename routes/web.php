<?php
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\Auth\MyWelcomeController;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login', 'LDAPController@login');
Route::post('/login', 'LDAPController@log_user');

Route::get('/tramites', 'TramitesController@home')->middleware('can:listar-tramite');

Route::get('/tramite/alta', 'TramitesController@alta')->middleware('can:alta-tramite');
Route::post('/tramite/alta', 'TramitesController@submit')->middleware('can:alta-tramite');

Route::get('/tramite/{id_tramite}/ver', 'TramitesController@ver');
Route::get('/tramite/{id_tramite}/pdf', 'TramitesController@pdf');
Route::post('/tramite/{id_tramite}/ver', 'TramitesController@submit_medico');

Route::get('/tramite/{id_tramite}/auditar', 'TramitesController@auditar')->middleware('can:auditar-tramite');
Route::post('/tramite/{id_tramite}/auditar', 'TramitesController@submit_auditor')->middleware('can:auditar-tramite');

Route::get('/tramite/{id_tramite}/eliminar', 'TramitesController@eliminar')->middleware('can:eliminar-tramite');
Route::post('/tramite/{id_tramite}/eliminar', 'TramitesController@submit_eliminar')->middleware('can:eliminar-tramite');

Route::get('/ws/abewsvalidaafi', 'WebserviceController@abewsvalidaafi');
Route::post('/ws/abewsvalidaafi', 'WebserviceController@abewsvalidaafi');

Route::get('/select2-autocomplete-ajax', 'TramitesController@dataAjax');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/users/index', ['as' => 'users.index', 'uses' => 'UserController@index'])->middleware('can:admin-users');
Route::post('/users/create', [ 'as' => 'users.create', 'uses' => 'UserController@create'])->middleware('can:admin-users');
Route::get('/users/create', [ 'as' => 'users.create', 'uses' => 'UserController@create'])->middleware('can:admin-users');
Route::get('/users/{id_user}/show', 'UserController@show')->middleware('can:admin-users');

Route::post('/users/store', [ 'as' => 'users.store', 'uses' => 'UserController@store'])->middleware('can:admin-users');
Route::post('/users/update', [ 'as' => 'users.update', 'uses' => 'UserController@update'])->middleware('can:admin-users');

Route::get('/user/change-password', 'ChangePasswordController@index');
Route::post('/user/change-password', 'ChangePasswordController@store')->name('change.password');

Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('welcome/{user}', [MyWelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [MyWelcomeController::class, 'savePassword']);
});