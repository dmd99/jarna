<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $category = ProductCategory::with('children')->get();

        return view('welcome',['category'=>$category]);
    }
    public function categories()
    {
        $category = ProductCategory::with('children')->get();

        return response()->json([$category]);
        // return $category;
    }
}
