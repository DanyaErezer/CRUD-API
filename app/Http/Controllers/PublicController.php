<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class PublicController extends Controller
{
    public function products()
    {
        return Product::paginate(6);
    }

    public function productBySlug($slug)
    {
        return Product::where('slug', $slug)->firstOrFail();
    }

    public function categoryTree()
    {
        return $this->buildTree(ProductCategory::whereNull('parent_id')->get());
    }

    private function buildTree($categories)
    {
        return $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->title,
                'children' => $this->buildTree($category->children)
            ];
        });
    }

    public function categoriesWithProducts()
    {
        return ProductCategory::with('products')->get();
    }
}
