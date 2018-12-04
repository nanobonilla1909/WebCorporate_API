<?php

use Illuminate\Http\Request;

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




Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);


Route::resource('featured_products', 'Product\FeaturedProductController', ['only' => ['index', 'show']]);


Route::resource('product_categories', 'ProductCategory\ProductCategoryController', ['only' => ['index', 'show']]);


Route::apiResource('/{category}/products', 'ProductCategory\ProductCategoryController', ['only' => ['index']]);


Route::get('/category_children/{id}', 'ProductCategory\ProductCategoryChildrenController@inmediate_children');


Route::get('/category_last_children/{id}', 'ProductCategory\ProductCategoryChildrenController@last_children');


Route::get('/category_last_products_children/{id}', 'ProductCategory\ProductCategoryChildrenController@last_products_children');


Route::resource('home_page_category_orders', 'ProductCategory\HomePageCategoryOrderController', ['only' => ['index']]);

Route::resource('highlighted_items', 'Homepage\HighlightedItemController', ['only' => ['index']]);







