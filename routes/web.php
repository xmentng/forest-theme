<?php
/*
 * Web Routes
*/
Route::get('/', function () {
return view('welcome');
});

Route::auth();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// route to show the login form
Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'ChurchController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'GroupController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'MediaController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'RoleController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'TestimonyController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'TransactionController@index'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'UserController@index'));
});


Route::group(['middleware' => ['auth']], function() {

Route::get('/home', 'HomeController@index');

//Route::get('/', 'AdminController@index');

Route::resource('users','UserController');

Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

Route::get('church',['as'=>'church.index','uses'=>'ChurchController@index','middleware' => ['permission:church-list|church-create|edit-church|delete-church']]);
Route::get('church/create',['as'=>'church.create','uses'=>'ChurchController@create','middleware' => ['permission:church-create']]);
Route::post('church/create',['as'=>'church.store','uses'=>'ChurchController@store','middleware' => ['permission:church-create']]);
Route::get('church/{id}',['as'=>'church.show','uses'=>'ChurchController@show']);
Route::get('church/{id}/edit',['as'=>'church.edit','uses'=>'ChurchController@edit','middleware' => ['permission:edit-church']]);
Route::patch('church/{id}',['as'=>'church.update','uses'=>'ChurchController@update','middleware' => ['permission:edit-church']]);
Route::delete('church/{id}',['as'=>'church.destroy','uses'=>'ChurchController@destroy','middleware' => ['permission:delete-church']]);

Route::get('group',['as'=>'group.index','uses'=>'GroupController@index','middleware' => ['permission:cell-list|create-cell|cell-edit|cell-delete']]);
Route::get('group/create',['as'=>'group.create','uses'=>'GroupController@create','middleware' => ['permission:create-cell']]);
Route::post('group/create',['as'=>'group.store','uses'=>'GroupController@store','middleware' => ['permission:create-cell']]);
Route::get('group/{id}',['as'=>'group.show','uses'=>'GroupController@show']);
Route::get('group/{id}/edit',['as'=>'group.edit','uses'=>'GroupController@edit','middleware' => ['permission:cell-edit']]);
Route::patch('group/{id}',['as'=>'group.update','uses'=>'GroupController@update','middleware' => ['permission:cell-edit']]);
Route::delete('group/{id}',['as'=>'group.destroy','uses'=>'GroupController@destroy','middleware' => ['permission:cell-delete']]);

Route::get('media',['as'=>'media.index','uses'=>'MediaController@index','middleware' => ['permission:media-list|media-create|media-edit|delete-media']]);
Route::get('media/create',['as'=>'media.create','uses'=>'MediaController@create','middleware' => ['permission:media-create']]);
Route::post('media/create',['as'=>'media.store','uses'=>'MediaController@store','middleware' => ['permission:media-create']]);
Route::get('media/{id}',['as'=>'media.show','uses'=>'MediaController@show']);
Route::get('media/{id}/edit',['as'=>'media.edit','uses'=>'MediaController@edit','middleware' => ['permission:media-edit']]);
Route::patch('media/{id}',['as'=>'media.update','uses'=>'MediaController@update','middleware' => ['permission:media-edit']]);
Route::delete('media/{id}',['as'=>'media.destroy','uses'=>'MediaController@destroy','middleware' => ['permission:delete-media']]);

Route::get('testimony',['as'=>'testimony.index','uses'=>'TestimonyController@index','middleware' => ['permission:testimony-list|create-testimony|testimony-edit|testimony-delete']]);
Route::get('testimony/create',['as'=>'testimony.create','uses'=>'TestimonyController@create','middleware' => ['permission:create-testimony']]);
Route::post('testimony/create',['as'=>'testimony.store','uses'=>'TestimonyController@store','middleware' => ['permission:create-testimony']]);
Route::get('testimony/{id}',['as'=>'testimony.show','uses'=>'TestimonyController@show']);
Route::get('testimony/{id}/edit',['as'=>'testimony.edit','uses'=>'TestimonyController@edit','middleware' => ['permission:testimony-edit']]);
Route::patch('testimony/{id}',['as'=>'testimony.update','uses'=>'TestimonyController@update','middleware' => ['permission:testimony-edit']]);
Route::delete('testimony/{id}',['as'=>'testimony.destroy','uses'=>'TestimonyController@destroy','middleware' => ['permission:testimony-delete']]);

Route::get('transaction',['as'=>'transaction.index','uses'=>'TransactionController@index','middleware' => ['permission:transaction-list|create-transaction|transaction-edit|transaction-delete']]);
Route::get('transaction/create',['as'=>'transaction.create','uses'=>'transactionController@create','middleware' => ['permission:create-transaction']]);
Route::post('transaction/create',['as'=>'transaction.store','uses'=>'TransactionController@store','middleware' => ['permission:create-transaction']]);
Route::get('transaction/{id}',['as'=>'transaction.show','uses'=>'TransactionController@show']);
Route::get('transaction/{id}/edit',['as'=>'transaction.edit','uses'=>'TransactionController@edit','middleware' => ['permission:transaction-edit']]);
Route::patch('transaction/{id}',['as'=>'transaction.update','uses'=>'TransactionController@update','middleware' => ['permission:transaction-edit']]);
Route::delete('transaction/{id}',['as'=>'transaction.destroy','uses'=>'TransactionController@destroy','middleware' => ['permission:transaction-delete']]);

Route::get('user',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
Route::get('user/create',['as'=>'user.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
Route::post('user/create',['as'=>'user.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
Route::get('user/{id}',['as'=>'user.show','uses'=>'UserController@show']);
Route::get('user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
Route::patch('user/{id}',['as'=>'user.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
Route::delete('user/{id}',['as'=>'user.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);
});