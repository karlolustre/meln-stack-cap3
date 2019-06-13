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

//register a route that will return the welcome view when a GET request is sent to the / URI
Route::?('?', function () {
    return ?('?');
});

//register a route that will return the login view from the users directory when a GET request is sent to the /users/login URI
Route::?('?', function() {
	return ?('?');
});

//register a route that will return the register view from the users directory when a GET request is sent to the /users/register URI
Route::?('?', function() {
	return ?('?');
});

//register a route that will return the book view from the availabilities directory when a GET request is sent to the /availabilities/{id} URI
//pass in the id wildcard as an argument to the compact function so that it can be used in the target view
Route::?('?', function(?) {
	return ?('?', compact('?'));
});

//register a route that will return the admin view from the users directory when a GET request is sent to the /admin URI
Route::?('?', function() {
	return ?('?');
});

//register a route that will return the update view from the availabilities directory when a GET request is sent to the /availabilities/update/{id} URI
//pass in the id wildcard as an argument to the compact function so that it can be used in the target view
Route::?('?', function(?) {
	return ?('?', compact('?'));
});

//register a route that will return the adminView view from the transactions directory when a GET request is sent to the /admin/transactions URI
Route::?('?', function() {
	return ?('?');
});

//register a route that will return the guestView view from the transactions directory when a GET request is sent to the /transactions/{id} URI
//pass in the id wildcard as an argument to the compact function so that it can be used in the target view
Route::?('?', function(?) {
	return ?('?', compact('?'));
});