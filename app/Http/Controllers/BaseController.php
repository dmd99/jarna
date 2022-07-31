<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $category = ProductCategory::with('children')->get();
        $products = Product::with([
            'productDetails', 'taxes', 'category', 'shops', 'inventory', 'measurement', 'unit'
        ])->get();
        return view('welcome',['category'=>$category,'products'=>$products]);
    }
    public function categories()
    {
        $category = ProductCategory::with('children')->get();

        return response()->json($category);
        // return $category;
    }
}
