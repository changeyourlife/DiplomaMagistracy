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

Auth::routes();

/*
 * SiteController routes
 */
Route::get('/', 'SiteController@index')->name('index');
Route::get('/about', 'SiteController@about')->name('about');

/*
 * AdminController routes
 */
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('getAdminLogin');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('postAdminLogin');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('getAdminLogout');

    Route::prefix('users')->group(function() {
        Route::get('/list', 'AdminController@getUsersList')->name('getAdminUsersList');
        Route::get('/add', 'AdminController@getAddUser')->name('getAdminAddUser');
        Route::post('/add', 'AdminController@postAddUser')->name('postAdminAddUser');

        Route::get( '/edit/{id}', 'AdminController@getUserEdit' )->name( 'getAdminUserEdit' );
        Route::post( '/edit/{id}', 'AdminController@postUserEdit' )->name( 'postAdminUserEdit' );

        Route::get( '/delete/{id}', 'AdminController@getUserDelete' )->name( 'getAdminUserDelete' );
    });
    Route::get('/settings', 'AdminController@getSettings')->name('getAdminSettings');

    Route::get('/', 'AdminController@getControlPanel')->name('getAdminControlPanel');
});

/*
 * UserController routes
 */
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@getControlPanel')->name('getUserControlPanel');
    Route::get('/mailbox/{id}', 'UserController@getMailbox')->name('getUserMailbox');
    Route::get('/add/mailbox', 'UserController@getAddMailbox')->name('getUserAddMailbox');
    Route::post('/add/mailbox', 'UserController@postAddMailbox')->name('postUserAddMailbox');
    Route::get('/logout', 'Auth\LoginController@logout')->name('getUserLogout');

});