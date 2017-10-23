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

Route::get('/hello', function () {
    return view('welcome');
});

Route::get('index','IndexController@getIndex')->name('index');
Route::get('category/{type}','CategoryController@getCate')->name('category');
Route::get('product','ProductController@getProduct');
Route::get('detail','detailController@getDetail')->name('contact');
Route::get('about','aboutController@getAbout')->name('about');
Route::get('news','newsController@getInfo')->name('news');
Route::get('detail-news','newsController@getDetail');
Route::get('signup','signupController@signup')->name('signups');
Route::post('signup','signupController@postsignup')->name('signup');
Route::get('login','loginController@login')->name('login');
Route::get('product-detail/{id}','ProductController@getDetail')->name('product_detail');
Route::get('search','IndexController@getSearch')->name('search');

Route::get('add-to-cart/{id}',[
    'as'=>'addcart',
    'uses'=>'IndexController@getCart'
]);

Route::get('delete-cart/{id}',[
    'as'=>'deletecart',
    'uses'=>'IndexController@deleteCart'
]);

Route::get('checkout',[
    'as'=>'checkout-cart',
    'uses'=>'IndexController@checkout'
]);

Route::post('checkout',[
    'as'=>'checkout-cart',
    'uses'=>'IndexController@postCheckout'
]);

Route::get('news-detail','newsController@getDetail')->name('detail-news');



Route::group([
    'prefix' => 'admin',
    'as' => 'admin.', 
    'namespace' => 'Admin',
    // 'middleware' => 'auth',
], function (){


        Route::get('delete-user/{id}','UserController@deleteUser')->name('delete-user');

        Route::get('login','LoginController@getLogin')->name('getLogin');

        Route::get('index','PageController@getIndex')->name('index');

        Route::get('get-form-category','CategoryController@getFormCategory')->name('category');

        Route::post('post-category','CategoryController@postCategory')->name('post-category');

        Route::get('list-category','CategoryController@listCategory')->name('list-category');

        Route::get('edit-category/{id}','CategoryController@editCategory')->name('edit-category');

        Route::post('post-edit-category/{id}','CategoryController@postEditCategory')->name('post-edit-category');

        Route::get('delete-category/{id}','CategoryController@deleteCategory')->name('delete-category');


        Route::get('add-product','ProductController@getFormProduct')->name('add-product');

        Route::post('post-add-product','ProductController@postProduct')->name('post-add-product');

        Route::get('list-product','ProductController@listProduct')->name('list-product');

        Route::get('get-edit-product/{id}','ProductController@getFormEditProduct')->name('edit-product');

        Route::post('post-edit-product/{id}','ProductController@postEditProduct')->name('post-edit-product');

        Route::get('delete-product/{id}','ProductController@deleteProduct')->name('delete-product');

        Route::get('add-slide','SlideController@getFormSlide')->name('add-slide');

        Route::post('post-slide','SlideController@postSlide')->name('post-slide');

        Route::get('list-slide','SlideController@listSlide')->name('list-slide');

        Route::get('delete-slide/{id}','SlideController@deleteSlide')->name('delete-slide');

        Route::get('get-edit-slide/{id}','SlideController@getEditSlide')->name('get-edit-slide');

        Route::post('post-edit-slide/{id}','SlideController@postEditSlide')->name('post-edit-slide');
        Route::get('search','SlideController@getSearch')->name('search');

        Route::get('list-user','UserController@listUser')->name('list-user');

        Route::get('add-user','UserController@getFormUser')->name('add-user');

        Route::post('add-user','UserController@postUser')->name('post-user');

        Route::get('get-edit-user/{id}','UserController@getEditUser')->name('get-edit-user');

        Route::post('post-edit-user/{id}','UserController@postEditUser')->name('post-edit-user');

    Route::get('add-news', 'NewsController@getFormNews')->name('add-news');

    Route::post('post-news', 'NewsController@postNews')->name('post-news');

    Route::get('list-news', 'NewsController@listNews')->name('list-news');

    Route::get('delete-news/{id}', 'NewsController@deleteNews')->name('delete-news');

    Route::get('get-edit-news/{id}', 'NewsController@getFormEditNews')->name('edit-news');

    Route::post('post-edit-news/{id}', 'NewsController@postEditNews')->name('post-edit-news');

    Route::post('login','LoginController@postLogin')->name('postLogin');

    Route::get('logout','LoginController@getLogout')->name('getLogout');

    Route::get('search-user','UserController@getSearch')->name('getSearch');



});




