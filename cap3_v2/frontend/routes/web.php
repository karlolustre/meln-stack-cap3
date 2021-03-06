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

Route::get('/home', function() {
    return view('home');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/register', function() {
    return view('register');
});

//client
Route::get('/studio', function() {
    return view('./client/studio');
});

// Route::get('/bookings', function() {
//     return view('./client/bookings');
// });
Route::get('/contact', function() {
    return view('./client/contact');
});

Route::get('/availability/{id}', function($id) {
    return view('./client/availability', compact('id'));
});

Route::get('/transactions/{id}', function($id) {
    return view('./client/transaction', compact('id'));
});




// admin
Route::get('/admin_home', function() {
    return view('./admin/admin_home');
});

Route::get('/admin_studios', function() {
    return view('./admin/admin_studios');
});

Route::get('/admin_studios_create', function() {
    return view('./admin/admin_studio_create');
});

Route::get('/admin_members', function() {
    return view('./admin/admin_members');
});

Route::get('/admin_member_create', function() {
    return view('./admin/admin_member_create');
});

Route::get('/admin_transactions', function() {
    return view('./admin/admin_transaction');
});



// Route::get('/admin_studio_edit', function() {
//     return view('./admin/admin_studio_edit');
// });