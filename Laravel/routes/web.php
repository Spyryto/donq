<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/../../main.php';

Route::redirect('/', '/listing');

Route::get('/listing', function () use ($app) {
    $photoCollection = $app->getPhotoPreviews();
    return view('listing', ['photos' => $photoCollection]);
});

Route::get('/detail/{index}', function ($index) use ($app) {
    $photo = $app->getPhotoDetails((int) $index);
    return view('detail', ['photo' => $photo]);
});

Route::get('/refresh', function () use ($app) {
    $app->refreshData();
    return redirect('/listing');
});
