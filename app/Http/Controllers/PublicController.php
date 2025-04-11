<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicController extends Controller
{
    public function products(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::paginate(6));
    }

    public function productBySlug(string $slug): ProductResource
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return new ProductResource($product);
    }

    public function categoryTree(): JsonResponse
    {
        $categories = ProductCategory::all();
        $tree = $this->buildTree($categories);

        return response()->json($tree);
    }

    private function buildTree($categories, $parentId = null): array
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category->parent_id === $parentId) {
                $children = $this->buildTree($categories, $category->id);

                $branch[] = [
                    'id' => $category->id,
                    'title' => $category->title,
                    'slug' => $category->slug,
                    'children' => $children
                ];
            }
        }

        return $branch;
    }

    public function categoriesWithProducts(): AnonymousResourceCollection
    {
        $categories = ProductCategory::with(['products'])->get();

        return ProductCategoryResource::collection($categories);
    }
}
