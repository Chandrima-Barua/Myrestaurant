<?php

use App\Owner;
use Illuminate\Support\Facades\Input;



Route::get('/', function () {
    return view('welcome');
});

//for customers
Route::get('/customer', function () {
    return view('customer');
});
//for showing list to customers
Route::get('customer/list', 'CustomerController@index')->name('list');

//for searching
Route::get('customer/list/search', 'CustomerController@search')->name('restaurant-search');

//for showing profile
Route::get('customer/list/{id}', 'CustomerController@show')->name('profile-show');


//for customer post
Route::get('customer/post', 'CustomerPostController@create')->name('cus-post'); //request for post form
Route::post('customer/post/post-list', 'CustomerPostController@post_store')->name('cus-post-store'); //for submitting input
Route::get('customer/post/post-list', 'CustomerPostController@index_post')->name('cus-post-show');
Route::get('customer/post/edit/{id}', 'CustomerPostController@post_edit')->name('cus-post-edit');
Route::post('customer/post/update/{id}' , 'CustomerPostController@post_update')->name('cus-post-update');
Route::get('customer/post/delete/{id}', 'CustomerPostController@post_destroy')->name('cus-post-delete');


//for commenting
Route::post('customer/comment/{customer_post_id}', 'CustomerCommentController@store_comment')->name('cus-store-comment');
Route::get('customer/comment/{customer_post_id}' , 'CustomerCommentController@index')->name('cus-show-comment');
Route::get('customer/comment/edit/{id}', 'CustomerCommentController@edit')->name('cus-comment-edit');
Route::post('customer/comment/update/{id}', 'CustomerCommentController@update')->name('cus-comment-update');
Route::get('customer/comment/delete/{id}', 'CustomerCommentController@destroy')->name('cus-comment-delete');






//default authentication
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




//for creating restaurant list
Route::get('create', 'OwnerController@create')->name('create');
Route::post('create/owner-list', 'OwnerController@store')->name('store');
Route::get('create/owner-list', 'OwnerController@index')->name('list-show');
Route::get('create/owner-list/{id}', 'OwnerController@show')->name('owner-show');
Route::get('edit/{id}', 'OwnerController@edit')->name('edit');
Route::post('update/{id}' , 'OwnerController@update')->name('update');
Route::get('delete/{id}', 'OwnerController@destroy')->name('delete');

//for searching
Route::get('search', 'OwnerController@search')->name('search');


//for post
Route::get('post', 'PostController@create')->name('post'); //request for post form
Route::post('post/post-list', 'PostController@post_store')->name('post_store'); //for submitting input
Route::get('post-list', 'PostController@index_post')->name('show');
Route::get('post/edit/{id}', 'PostController@post_edit')->name('post_edit');
Route::post('post/update/{id}' , 'PostController@post_update')->name('post_update');
Route::get('post/delete/{id}', 'PostController@post_destroy')->name('post_delete');


//for commenting
Route::post('comment/{post_id}', 'CommentController@store_comment')->name('store_comment');
Route::get('comment/{post_id}' , 'CommentController@index')->name('show_comment');
Route::get('comment/edit/{id}', 'CommentController@edit')->name('comment_edit');
Route::post('comment/update/{id}', 'CommentController@update')->name('comment_update');
Route::get('comment/delete/{id}', 'CommentController@destroy')->name('comment_delete');


//for admin authentication
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('/delete/{id}', 'PostController@admin_post_destroy')->name('admin_post');
});

//for post approval
Route::get('/pending/posts', 'PostController@pending')->name('pending');
Route::post('/approve/post/{id}', 'PostController@approval')->name('post.approval');
Route::get('/approved/post-list', 'PostController@index_post')->name('show');