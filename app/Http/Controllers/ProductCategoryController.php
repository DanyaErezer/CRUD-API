<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return ProductCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        return ProductCategory::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(productCategory $productCategory): ProductCategory
    {
        return $productCategory;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, productCategory $productCategory): ProductCategory
    {
        $productCategory->update($request->validated());

        return $productCategory;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productCategory $productCategory): Response
    {
        $productCategory->delete();

        return response()->noContent();
    }
}
