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

Route::get('media', 'MediaController@index');

Route::get('media/get/{filename}', [
		'as' => 'getentry', 'uses' => 'MediaController@get'
	]);

Route::post('media/add',[ 
        'as' => 'addentry', 'uses' => 'MediaController@add'
        ]);

//Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::auth();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UserController');

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('church',['as'=>'church.index','uses'=>'ChurchController@index','middleware' => ['permission:church-list|church-create|church-edit|church-delete']]);
	Route::get('church/create',['as'=>'church.create','uses'=>'ChurchController@create','middleware' => ['permission:church-create']]);
	Route::post('church/create',['as'=>'church.store','uses'=>'ChurchController@store','middleware' => ['permission:church-create']]);
	Route::get('church/{id}',['as'=>'church.show','uses'=>'ChurchController@show']);
	Route::get('church/{id}/edit',['as'=>'church.edit','uses'=>'ChurchController@edit','middleware' => ['permission:church-edit']]);
	Route::patch('church/{id}',['as'=>'church.update','uses'=>'ChurchController@update','middleware' => ['permission:church-edit']]);
	Route::delete('church/{id}',['as'=>'church.destroy','uses'=>'ChurchController@destroy','middleware' => ['permission:church-delete']]);

	Route::get('cell',['as'=>'cell.index','uses'=>'CellController@index','middleware' => ['permission:cell-list|cell-create|cell-edit|cell-delete']]);
	Route::get('cell/create',['as'=>'cell.create','uses'=>'CellController@create','middleware' => ['permission:cell-create']]);
	Route::post('cell/create',['as'=>'cell.store','uses'=>'CellController@store','middleware' => ['permission:cell-create']]);
	Route::get('cell/{id}',['as'=>'cell.show','uses'=>'CellController@show']);
	Route::get('cell/{id}/edit',['as'=>'cell.edit','uses'=>'CellController@edit','middleware' => ['permission:cell-edit']]);
	Route::patch('cell/{id}',['as'=>'cell.update','uses'=>'CellController@update','middleware' => ['permission:cell-edit']]);
	Route::delete('cell/{id}',['as'=>'cell.destroy','uses'=>'CellController@destroy','middleware' => ['permission:cell-delete']]);

	Route::get('testimony',['as'=>'testimony.index','uses'=>'TestimonyController@index','middleware' => ['permission:testimony-list|testimony-create|testimony-edit|testimony-delete']]);
	Route::get('testimony/create',['as'=>'testimony.create','uses'=>'TestimonyController@create','middleware' => ['permission:testimony-create']]);
	Route::post('testimony/create',['as'=>'testimony.store','uses'=>'TestimonyController@store','middleware' => ['permission:testimony-create']]);
	Route::get('testimony/{id}',['as'=>'testimony.show','uses'=>'TestimonyController@show']);
	Route::get('testimony/{id}/edit',['as'=>'testimony.edit','uses'=>'TestimonyController@edit','middleware' => ['permission:testimony-edit']]);
	Route::patch('testimony/{id}',['as'=>'testimony.update','uses'=>'TestimonyController@update','middleware' => ['permission:testimony-edit']]);
	Route::delete('testimony/{id}',['as'=>'testimony.destroy','uses'=>'TestimonyController@destroy','middleware' => ['permission:testimony-delete']]);

	Route::get('transaction',['as'=>'transaction.index','uses'=>'TransactionController@index','middleware' => ['permission:transaction-list|transaction-create|transaction-edit|transaction-delete']]);
	Route::get('transaction/create',['as'=>'transaction.create','uses'=>'TransactionController@create','middleware' => ['permission:transaction-create']]);
	Route::post('transaction/create',['as'=>'transaction.store','uses'=>'TransactionController@store','middleware' => ['permission:transaction-create']]);
	Route::get('transaction/{id}',['as'=>'transaction.show','uses'=>'TransactionController@show']);
	Route::get('transaction/{id}/edit',['as'=>'transaction.edit','uses'=>'TransactionController@edit','middleware' => ['permission:transaction-edit']]);
	Route::patch('transaction/{id}',['as'=>'transaction.update','uses'=>'TransactionController@update','middleware' => ['permission:transaction-edit']]);
	Route::delete('transaction/{id}',['as'=>'transaction.destroy','uses'=>'TransactionController@destroy','middleware' => ['permission:transaction-delete']]);
	});
