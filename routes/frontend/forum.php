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

        Route::group(['namespace' => 'Post', 'as' => 'post.'], function (){

        });

    });
});
