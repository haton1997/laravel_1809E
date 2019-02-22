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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Route cho Adminstator
 *
 */
Route::prefix('admin')->group(function (){
//   GOm nhóm các route cho phần admin
    /*
     * URL:authen.com/admin
     * Route đăng nhập mặc định cho admin
    */
    Route::get('/','AdminController@index')->name('admin.dasboard');
    /*
     * URL:authen.com/admin/dasboard
     * Route đăng nhập thành công
     * */
    Route::get('/dasboard','AdminController@index')->name('admin.dasboard');
    /*
     * URL:authen.com/admin/register
     * Route trả về view dùng để đăng kí admin
     * */
    Route::get('register','AdminController@create')->name('admin.register');
    /*
     * URL:authen.com/admin/register
     * Phương thức là post
     * Route trả về view dùng để đăng kí admin từ form
     * */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /**
     * Url:authen.com/admin/login
     * Route tra về view đăng nhập admin
     */
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');
    /*
     * URL:authen.com/admin/login
     * Phương thức là post
     * Xử lý quá trình đăng nhập admin
    */
    Route::post('login','Auth\Admin\LoginController@login')->name('admin.auth.loginAdmin');
    /*
     * URL:authen.com/admin/logout
     * Phương thức là post
     * Xử lý quá trình đăng xuất admin
    */
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logoutAdmin');

});
