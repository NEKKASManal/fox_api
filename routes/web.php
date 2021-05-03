<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// Route::get('/tst','ReservationsController@index')->name('tst');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'PagesController@index');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('product', ProductController::class);
    Route::get('logoutt', function () { 
        auth()->logout(); 
        Session()->flush(); 
        return Redirect::to('/'); 
    })->name('logoutt');
});

Route::get('/create_product', function() {
    return view('products.create');
})->name('create_product');

Route::get('/edit_product', function() {
    return view('edit');
})->name('edit_product');

//Route::resource('product',ProductController::class);

Route::get('/delete/{id}','ProductController@destroy')->name('delete');
// Route::get('/update/{id}','ProductController@update')->name('update');

// Route::get('/index_product','ProductController@index')->name('index_product');
// Route::get('/show_product','ProductController@index')->name('index_product');



// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

