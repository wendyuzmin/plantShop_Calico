<?php
use Illuminate\Support\Facades\Route;

Route::view('/', 'login');

Route::view('/admin','admin');
Route::view('/cliente','cliente');
//decir que llame a login.blade.php