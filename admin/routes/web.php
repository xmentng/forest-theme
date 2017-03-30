<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('cells', 'CellsController');
    Route::post('cells_mass_destroy', ['uses' => 'CellsController@massDestroy', 'as' => 'cells.mass_destroy']);
    Route::resource('churches', 'ChurchesController');
    Route::post('churches_mass_destroy', ['uses' => 'ChurchesController@massDestroy', 'as' => 'churches.mass_destroy']);
    Route::resource('medias', 'MediasController');
    Route::post('medias_mass_destroy', ['uses' => 'MediasController@massDestroy', 'as' => 'medias.mass_destroy']);
    Route::resource('testimonies', 'TestimoniesController');
    Route::post('testimonies_mass_destroy', ['uses' => 'TestimoniesController@massDestroy', 'as' => 'testimonies.mass_destroy']);
    Route::resource('partnerships', 'PartnershipsController');
    Route::post('partnerships_mass_destroy', ['uses' => 'PartnershipsController@massDestroy', 'as' => 'partnerships.mass_destroy']);
});
