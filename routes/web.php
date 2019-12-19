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

Route::get('test','Test\TestsController@index');
Route::post('test','Test\TestsController@newfolder');

Route::redirect('/', '/home');

Route::redirect('dashboard', '/admin');

Auth::routes();

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    //products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductsController');

    //brands
    Route::resource('brands', 'BrandsController');

    //photos
    Route::resource('photos', 'PhotosController');

    //genders
    Route::resource('genders', 'GendersController');

    //categories
    Route::resource('categories', 'CategoriesController');

    //subcategories
    Route::resource('subcategories', 'SubcategoriesController');
    Route::delete('subcategories/destroy', 'SubcategoriesController@massDestroy')->name('subcategories.massDestroy');

    //sizes
    Route::resource('sizes','SizesController');

});

Route::resource('home', 'HomeController');

Route::get('/', 'HomeController@index')->name('home');
Route::post('/search', 'HomeController@search')->name('search');

Route::get('profile', 'UsersController@profile');
Route::post('profile', 'UsersController@update_avatar');

Route::get('products', 'Product\ProductsController@index')->name('products');
Route::get('products/{product}', 'Product\ProductsController@show')->name('products.show');
Route::get('products/{product}', 'Product\ProductsController@show')->name('products.show');

Route::get('brands', 'Product\BrandsController@index')->name('brands');
Route::get('brands/{id}', 'Product\ProductsController@brands')->name('brands.show');;


Route::get('footwear','Product\CategoriesController@footwear')->name('footwear');;
Route::get('clothing','Product\CategoriesController@clothing')->name('clothing');;
Route::get('accessories','Product\CategoriesController@accessories')->name('accessories');;