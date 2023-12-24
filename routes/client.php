<?php

use Illuminate\Support\Facades\Route;

Route::get('/client', function () {
    return 'Anyong client';
});

Route::get('/home', function () {
    return view('home');
})->name('home'); // Give a name to the route


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/product1', function () {
    return view('product1');
})->name('product1');

Route::get('/home1', function () {
    return view('home1');
})->name('home1');

Route::get('/about2', function () {
    return view('about2');
})->name('about2');