<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::apiResource('products', ProductController::class);
Route::apiResource('product_categories', ProductCategoryController::class);

Route::get('/public/product',[PublicController::class,'products']);
Route::get('/public/product/{slug}',[PublicController::class,'productBySlug']);
Route::get('/public/product_categories',[PublicController::class,'categoryTree']);
Route::get('/public/categories_with_products',[PublicController::class,'categoriesWithProducts']);



