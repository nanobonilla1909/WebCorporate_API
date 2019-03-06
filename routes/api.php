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


// Todo lo referente al Cart y CarItems
// ------------------------------------

Route::get('/cart_items_quantity/{cart_id}', 'TemporaryCart\CartController@items_quantity');

Route::get('/carts/{cart_id}', 'TemporaryCart\CartController@show');


Route::resource('cart_items', 'TemporaryCart\CartItemController', ['only' => ['index', 'store', 'update', 'destroy']]);


Route::delete('/cart_items_empty/{cart_id}', 'TemporaryCart\CartController@empty');



// Todo lo referente al User
// -------------------------

Route::resource('users.deliveries', 'User\UserDeliveryController', ['only' => ['index']]);



// Companies
// ---------

Route::resource('companies', 'CompanyController', ['only' => ['index']]);



// Todo lo referente al Pago
// -------------------------

Route::resource('users.deliveries', 'User\UserDeliveryController', ['only' => ['index']]);

Route::resource('bank_benefits', 'BankBenefitController', ['only' => ['index','show']]);

Route::resource('payment_methods', 'PaymentMethodController', ['only' => ['index','show']]);

Route::get('/payment_options', 'PaymentOptionController@index');

