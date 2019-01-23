<?php

use Illuminate\Http\Request;




Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);


Route::resource('featured_products', 'Product\FeaturedProductController', ['only' => ['index', 'show']]);


Route::resource('product_categories', 'ProductCategory\ProductCategoryController', ['only' => ['index', 'show']]);


Route::apiResource('/{category}/products', 'ProductCategory\ProductCategoryController', ['only' => ['index']]);


Route::get('/category_children/{id}', 'ProductCategory\ProductCategoryChildrenController@inmediate_children');


Route::get('/category_last_children/{id}', 'ProductCategory\ProductCategoryChildrenController@last_children');


Route::get('/category_last_products_children/{id}', 'ProductCategory\ProductCategoryChildrenController@last_products_children');


Route::resource('home_page_category_orders', 'ProductCategory\HomePageCategoryOrderController', ['only' => ['index']]);

Route::resource('highlighted_items', 'Homepage\HighlightedItemController', ['only' => ['index']]);


Route::get('/characterized_products/{products}', 'CharacterizedProduct\CharacterizedProductController@index');


Route::get('/category_last_products_children_characterized/{id}', 'ProductCategory\ProductCategoryChildrenController@last_products_children_characterized');


Route::get('/temporary_cart/{user}', 'TemporaryCart\TemporaryCartController@index', ['only' => ['index']]);





