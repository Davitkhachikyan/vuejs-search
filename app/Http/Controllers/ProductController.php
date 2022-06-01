<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ProductController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function showAll(): JsonResponse
    {
        $products = Product::with('categories')->paginate(20);
        foreach ($products as $product) {
            $product->category = $product->categories->name;
        }
        return response()->json($products);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $products = Product::with('categories');
        $minPrice = $request['data']['minPrice'];
        $maxPrice = $request['data']['maxPrice'];
        $available = $request['data']['available'];
        $category = $request['data']['category'];

        if(isset($minPrice))
        {
            $products->where('price', '>', $minPrice);
        }

        if (isset($maxPrice))
        {
            $products->where('price', '<', $maxPrice);
        }

        if(isset($available)) {
            $products->where('available', $available);
        }

        if(isset($category))
        {
            $products->where( function ($query) use ($category) {
                $query->whereHas('categories', function ($query) use ($category){
                    $query->where('name', 'LIKE', '%' . $category . '%');
                });
            });
        }
        $products = $products->paginate(20);

        foreach ($products as $product)
        {
            $product->category = $product->categories->name;
        }
        return response()->json($products);
    }
}
