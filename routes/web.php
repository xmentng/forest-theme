<?php
/*
 * Web Routes
*/

//Frontend
Route::get('/', function () {
    return view('welcome');
});

// route to show the login form
Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'DashboardController@index'));
});

Route::group(['middleware' => ['auth']],function(){

  Route::get('/home', 'HomeController@index');

  Route::get('/users',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list']]);

  Route::get('users/{id}',['as'=>'user.show','uses'=>'UserController@show']);

   Route::get('/churches',['as'=>'church.index','uses'=>'ChurchController@index','middleware' => ['permission:church-list']]);

   Route::get('churches/{id}',['as'=>'church.show','uses'=>'ChurchController@show']);

   Route::get('/medias',['as'=>'media.index','uses'=>'MediaController@index','middleware' => ['permission:media-list']]);

   Route::get('medias/{id}',['as'=>'media.show','uses'=>'MediaController@show']);

   Route::get('medias/create',['as'=>'media.create','uses'=>'MediaController@create','middleware' => ['permission:media-create']]);

   Route::post('medias/create',['as'=>'media.store','uses'=>'MediaController@store','middleware' => ['permission:media-create']]);

   Route::get('/testimonies',['as'=>'testimony.index','uses'=>'TestimonyController@index','middleware' => ['permission:testimony-list']]);

   Route::get('testimonies/{id}',['as'=>'testimony.show','uses'=>'TestimonyController@show']);

   Route::get('testimonies/create',['as'=>'testimony.create','uses'=>'TestimonyController@create','middleware' => ['permission:create-testimony']]);

   Route::post('testimonies/create',['as'=>'testimony.store','uses'=>'TestimonyController@store','middleware' => ['permission:create-testimony']]);

   Route::get('/transactions',['as'=>'transaction.index','uses'=>'TransactionController@index','middleware' => ['permission:transaction-list']]);

   Route::get('transactions/{id}',['as'=>'transaction.show','uses'=>'TransactionController@show']);

   Route::get('transactions/create',['as'=>'transaction.create','uses'=>'TransactionController@create','middleware' => ['permission:create-transaction']]);

   Route::post('transactions/create',['as'=>'transaction.store','uses'=>'TransactionController@store','middleware' => ['permission:create-transaction']]);

   Route::get('/groups',['as'=>'group.index','uses'=>'GroupController@index','middleware' => ['permission:cell-list']]);

   Route::get('groups/{id}',['as'=>'group.show','uses'=>'GroupController@show']);
  
});

//Authentication
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



//Backend
Route::group(['prefix' => '/admin/user', 'namespace' => 'Admin','middleware' => ['permission:user-create']], function () {
      Route::get('/', 'UserController@create')->name('admin.user.create');
      Route::post('/','UserController@store')->name('admin.user.store');
  });

Route::group(['prefix' => '/admin/user', 'middleware' => ['permission:user-edit']], function () {
      Route::get('/{id}/edit','UserController@edit')->name('admin.user.edit');
     Route::patch('/{id}/edit','UserController@update')->name('admin.user.update');
  });

Route::group(['prefix' => '/admin/user', 'middleware' => ['permission:user-delete']], function () {
      Route::get('/{id}/', 'UserController@destroy')->name('admin.user.destroy');
      Route::delete('/{id}/','UserController@destroy')->name('admin.user.destroy');
  });

Route::group(['prefix' => '/admin/church', 'namespace' => 'Admin','middleware' => ['permission:church-create']], function () {
      Route::get('/', 'ChurchController@create')->name('admin.church.create');
      Route::post('/','ChurchController@store')->name('admin.church.store');
  });

Route::group(['prefix' => '/admin/church', 'middleware' => ['permission:edit-church']], function () {
      Route::get('/{id}/edit','ChurchController@edit')->name('admin.church.edit');
     Route::patch('/{id}/edit','ChurchController@update')->name('admin.church.update');
  });

Route::group(['prefix' => '/admin/church', 'middleware' => ['permission:delete-church']], function () {
      Route::get('/{id}/', 'ChurchController@destroy')->name('admin.church.destroy');
      Route::delete('/{id}/','ChurchController@destroy')->name('admin.church.destroy');
  });
