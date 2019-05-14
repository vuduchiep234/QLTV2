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

Route::get('homeAdmin',
 	['as'=>'homeAdmin', 'uses'=>'AdminController@getHome']
);

Route::get('listRole',
	['as'=>'listRole', 'uses'=>'AdminController@getListRole']
);

Route::get('listUser',
	['as'=>'listUser', 'uses'=>'AdminController@getListUser']
);

Route::get('listBook',
	['as'=>'listBook', 'uses'=>'AdminController@getListBook']
);

Route::get('listBookQuantity',
	['as'=>'listBookQuantity', 'uses'=>'AdminController@getListBookQuantity']
);

Route::get('listAuthorBook',
	['as'=>'listAuthorBook', 'uses'=>'AdminController@getListAuthorBook']
);

Route::get('listBookGenre',
	['as'=>'listBookGenre', 'uses'=>'AdminController@getListBookGenre']
);

Route::get('listPublisher',
	['as'=>'listPublisher', 'uses'=>'AdminController@getListPublisher']
);

Route::get('listAuthor',
	['as'=>'listAuthor', 'uses'=>'AdminController@getListAuthor']
);

Route::get('listGenre',
	['as'=>'listGenre', 'uses'=>'AdminController@getListGenre']
);

Route::get('listBookImage',
	['as'=>'listBookImage', 'uses'=>'AdminController@getListBookImage']
);

Route::get('listImageUser',
	['as'=>'listImageUser', 'uses'=>'AdminController@getListImageUser']
);

Route::get('listImage',
	['as'=>'listImage', 'uses'=>'AdminController@getListImage']
);

Route::get('listBookCopy',
	['as'=>'listBookCopy', 'uses'=>'AdminController@getListBookCopy']
);

Route::get('listBookHistory',
	['as'=>'listBookHistory', 'uses'=>'AdminController@getListBookHistory']
);

Route::get('listRentBook',
	['as'=>'listRentBook', 'uses'=>'AdminController@getListRentBook']
);

Route::get('listReturnBook',
	['as'=>'listReturnBook', 'uses'=>'AdminController@getListReturnBook']
);

Route::get('register',
	['as'=>'register', 'uses'=>'RegisterController@getRegister']
);

Route::get('login',
	['as'=>'login', 'uses'=>'LoginController@login']
);

// Route::get('register','RegisterController@getRegister');

// Route::get('login','LoginController@login');


Route::get('homePage',
 	['as'=>'homePage', 'uses'=>'UserController@getHome']
);

Route::get('book/{id}',
 	['as'=>'book', 'uses'=>'UserController@getListBook']
);

Route::get('listBookOfAuthor/{id}',
 	['as'=>'listBookOfAuthor', 'uses'=>'UserController@getListAuthorBook']
);

Route::get('listBookOfGenre/{id}',
 	['as'=>'listBookOfGenre', 'uses'=>'UserController@getListBookGenre']
);

Route::get('detailBook/{id}',
 	['as'=>'detailBook', 'uses'=>'UserController@getBookDetail']
);



