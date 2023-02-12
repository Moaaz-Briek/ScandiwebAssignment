<?php
include 'autoload.php';
include 'config.php';

Route::get('/', 'ProductController::viewProductList');

Route::get('/getProducts', 'ProductController::getProducts');

Route::get('/addProduct', 'ProductController::viewProductPage');

Route::post('/addProduct', 'ProductController::addProduct');

Route::post('/addProduct', 'ProductController::addProduct');

Route::post('/deleteProduct', 'ProductController::deleteProduct');

Route::addNotFoundHandler(function (){
    $title = 'Not Found';
    require_once __DIR__ . '/frontend/layout/404.phtml';
});

Route::run();