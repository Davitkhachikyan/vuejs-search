<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;




class ProductController extends Controller
{
//    public function showAll(Request $request)
//    {
//        if (!$request->all()){
//            $products = Product::with('categories')->paginate(10);
//            foreach ($products as $product)
//            {
//                $product->category = $product->categories->name;
//            }
//            return response()->json($products);
//        }
//        else{
//            $products = Product::with('categories');
//            $minPrice = $request->data['minPrice'];
//            $maxPrice = $request->data['maxPrice'];
//            $available = $request->data['available'];
//            $category = $request->data['category'];
//
//            if(isset($minPrice)) {
//                $products->where('price', '>', $minPrice);
//            }
//
//            if (isset($maxPrice)) {
//               $products->where('price', '<', $maxPrice);
//            }
//
//            if(isset($available)) {
//                $products->where('available', $available);
//            }
//
//            if(isset($category)) {
//                $products->where( function ($query) use ($category) {
//                    $query->whereHas('categories', function ($query) use ($category){
//                        $query->where('name', 'LIKE', '%' . $category . '%');
//                    });
//                });
//            }
//
//            $prods =$products->paginate(10);
//            foreach ($prods as $product)
//            {
//                $product->category = $product->categories->name;
//            }
//            return response()->json($prods);
//        }
//    }

public function showAll(Request $request)
{
        $products = Product::with('categories')->paginate(20);
        foreach ($products as $product) {
            $product->category = $product->categories->name;
        }
        return response()->json($products);
}

    public function search(Request $request)
    {
        $products = Product::with('categories');

        $minPrice = $request->data['minPrice'];
        $maxPrice = $request->data['maxPrice'];
        $available = $request->data['available'];
        $category = $request->data['category'];

        if(isset($minPrice)) {
            $products->where('price', '>', $minPrice);
        }

        if (isset($maxPrice)) {
            $products->where('price', '<', $maxPrice);
        }

        if(isset($available)) {
            $products->where('available', $available);
        }

        if(isset($category)) {
            $products->where( function ($query) use ($category) {
                $query->whereHas('categories', function ($query) use ($category){
                    $query->where('name', 'LIKE', '%' . $category . '%');
                });
            });
        }
        $prods = $products->paginate(5);

        foreach ($prods as $product)
        {
            $product->category = $product->categories->name;
        }
        return response()->json($prods);

    }

}



