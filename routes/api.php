<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//POSTS

//fetch all posts
Route::get('posts','PostsController@index');

//create a post
Route::post('post/create','PostsController@store')->name('post.create');

//get single post 
Route::get('api/post/{id}', 'PostsController@show')->name('show');

//update a post
Route::put('post/{id}','PostsController@update');

//delete a post
Route::delete('/post/{id}', 'PostsController@destroy');



//COMMENTS

//create comment
Route::post('comment/create','CommentsController@store')->name('comment.create');
//delete comment
Route::delete('comment/delete/{id}','CommentsController@destroy')->name('comment.delete');


// create reply
Route::post('reply/create','CommentsController@reply')->name('comment.reply');
//delete reply
Route::delete('reply/delete/{id}','CommentsController@deleteReply')->name('reply.delete');