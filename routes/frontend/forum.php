<?php

/**
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.forum'.
 */
Route::group(['namespace' => 'Forum', 'as' => 'forum.'], function () {
    /*
    * These routes require the user to be logged in
    */
    Route::group(['middleware' => ['auth', 'password_expires']], function () {

        Route::get('/forum', 'ForumController@get_index');

        //Route::get('/forum', 'ForumController@get_index')->middleware(NavMenu::class);
        Route::get('/forum/create_post', 'ForumController@get_create_post');
        Route::post('/forum/create_post', 'ForumController@create_post');
        Route::get('/forum/posts/{post}', 'ForumController@get_post');
        Route::post('/forum/posts/{post}/newcomment', 'ForumController@newcomment');
        Route::post('/forum/comments/{comment}/newresponse', 'ForumController@newresponse');
        Route::get('/forum/responses/{response}/edit', 'ForumController@editresponse');
        Route::patch('/forum/responses/{response}', 'ForumController@updateresponse');
        Route::delete('/forum/posts/{post}',
        array('uses' => 'ForumController@deletePost'))->name('deletepost');
        Route::delete('/forum/comments/{comment}',
        array('uses' => 'ForumController@deleteComment'))->name('deletecomment');
        Route::delete('/forum/responses/{response}',
        array('uses' => 'ForumController@deleteResponse'))->name('deleteresponse');

        Route::group(['namespace' => 'Post', 'as' => 'post.'], function (){

        });

    });
});
