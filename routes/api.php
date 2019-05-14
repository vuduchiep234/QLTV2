<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {

    Route::prefix('books')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\BookController@get',
            'as' => 'api/v1/books/get'
        ]);

        Route::post('post', [
            'uses' => 'API\BookController@post',
            'as' => 'api/v1/books/post'
        ]);

        Route::post('patch/{id?}', [
            'uses' => 'API\BookController@patch',
            'as' => 'api/v1/books/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\BookController@delete',
            'as' => 'api/v1/books/delete'
        ]);

        Route::patch('import/{id?}', [
            'uses' => 'API\QuantityController@import',
            'as' => 'api/v1/books/import'
        ]);

        Route::patch('borrow', [
            'uses' => 'API\BookController@borrow',
            'as' => 'api/v1/books/borrow'
        ]);

        Route::get('all', [
            'uses' => 'API\BookController@all',
            'as' => 'api/v1/books/all'
        ]);

        Route::get('search', [
            'uses' => 'API\BookController@search',
            'as' => 'api/v1/books/search'
        ]);

    });

    Route::prefix('authors')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\AuthorController@get',
            'as' => 'api/v1/authors/get'
        ]);

        Route::post('post', [
            'uses' => 'API\AuthorController@post',
            'as' => 'api/v1/authors/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\AuthorController@patch',
            'as' => 'api/v1/authors/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\AuthorController@delete',
            'as' => 'api/v1/authors/delete'
        ]);

        Route::get('all', [
            'uses' => 'API\AuthorController@all',
            'as' => 'api/v1/authors/all'
        ]);
    });

    Route::prefix('publishers')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\PublisherController@get',
            'as' => 'api/v1/publishers/get'
        ]);

        Route::post('post', [
            'uses' => 'API\PublisherController@post',
            'as' => 'api/v1/publishers/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\PublisherController@patch',
            'as' => 'api/v1/publishers/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\PublisherController@delete',
            'as' => 'api/v1/publishers/delete'
        ]);

        Route::get('all', [
            'uses' => 'API\PublisherController@all',
            'as' => 'api/v1/publishers/all'
        ]);
    });

    Route::prefix('genres')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\GenreController@get',
            'as' => 'api/v1/genres/get'
        ]);

        Route::post('post', [
            'uses' => 'API\GenreController@post',
            'as' => 'api/v1/genres/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\GenreController@patch',
            'as' => 'api/v1/genres/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\GenreController@delete',
            'as' => 'api/v1/genres/delete'
        ]);

        Route::get('all', [
            'uses' => 'API\GenreController@all',
            'as' => 'api/v1/genres/all'
        ]);
    });

    Route::prefix('histories')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\BookHistoryController@get',
            'as' => 'api/v1/histories/get'
        ]);

        Route::post('post', [
            'uses' => 'API\BookHistoryController@post',
            'as' => 'api/v1/histories/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\BookHistoryController@patch',
            'as' => 'api/v1/histories/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\BookHistoryController@delete',
            'as' => 'api/v1/histories/delete'
        ]);

        Route::patch('rent/{id?}', [
            'uses' => 'API\BookHistoryController@rent',
            'as' => 'api/v1/histories/rent'
        ]);

        Route::patch('return/{id?}', [
            'uses' => 'API\BookHistoryController@returnBook',
            'as' => 'api/v1/histories/return'
        ]);

        Route::get('activeHistories', [
            'uses' => 'API\BookHistoryController@getActiveHistories',
            'as' => 'api/v1/histories/activeHistories'
        ]);

        Route::get('all', [
            'uses' => 'API\BookHistoryController@all',
            'as' => 'api/v1/histories/all'
        ]);
    });

    Route::prefix('cards')->group(function () {

        Route::post('post', [
            'uses' => 'API\CardController@post',
            'as' => 'api/v1/cards/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\CardController@renewed',
            'as' => 'api/v1/cards/renewed'
        ]);
    });

    Route::prefix('users')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\UserController@get',
            'as' => 'api/v1/users/get'
        ]);

        Route::post('register', [
            'uses' => 'API\UserController@post',
            'as' => 'api/v1/users/register'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\UserController@patch',
            'as' => 'api/v1/users/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\UserController@delete',
            'as' => 'api/v1/users/delete'
        ]);

        Route::get('all', [
            'uses' => 'API\UserController@all',
            'as' => 'api/v1/users/all'
        ]);

        Route::post('login', [
            'uses' => 'API\UserController@login',
            'as' => 'api/v1/users/login'
        ]);

        Route::post('logout', [
            'uses' => 'API\UserController@logout',
            'as' => 'api/v1/users/logout'
        ]);

        Route::get('session', [
            'uses' => 'API\UserController@getSessionData',
            'as' => 'api/v1/users/session'
        ]);

        Route::patch('changePassword', [
            'uses' => 'API\UserController@changePassword',
            'as' => 'api/v1/users/changePassword'
        ]);
    });

    Route::prefix('roles')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\RoleController@get',
            'as' => 'api/v1/roles/get'
        ]);

        Route::post('post', [
            'uses' => 'API\RoleController@post',
            'as' => 'api/v1/roles/post'
        ]);

        Route::patch('patch/{id?}', [
            'uses' => 'API\RoleController@patch',
            'as' => 'api/v1/roles/patch'
        ]);

        Route::delete('delete/{id?}', [
            'uses' => 'API\RoleController@delete',
            'as' => 'api/v1/roles/delete'
        ]);

        Route::get('all', [
            'uses' => 'API\RoleController@all',
            'as' => 'api/v1/roles/all'
        ]);
    });

    Route::prefix('bookCopies')->group(function () {
        Route::get('get/{id?}', [
            'uses' => 'API\BookCopyController@get',
            'as' => 'api/v1/bookCopies/get'
        ]);
    });
});
