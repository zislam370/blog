<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middlewareGroups' => ['web']], function () {
    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug', '[\w\d-\_]+');
    Route::get('blog',['as'=>'blog.index' ,'uses' => 'BlogController@getIndex']);
    Route::get('/', "PagesController@getIndex");
    //Route::get('blog', "PagesController@getBlog");
    Route::resource('posts', 'PostController');

    //Categories
    Route::resource('categories', 'CategoryController',['except'=>['create']]);

    // Comments

    Route::post('comments/{post_id}', ['uses'=>'CommentsController@store','as'=>'comments.store']);
    Route::delete('comments/{id}', ['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
    //Route::get('comments/{id}/delete', ['uses'=>'CommentsController@delete','as'=>'comments.delete']);
});