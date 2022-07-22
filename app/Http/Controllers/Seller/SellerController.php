<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product\Gallery;
use App\Models\Product\Inventory;
use App\Models\Product\Measurement;
use App\Models\Product\Product;
use App\Models\Product\ProductDetails;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seller= Auth::user();

        $shops = Shop::where('user_id', $seller->id)->first();
        $users = User::with('shop')->get();
        $orders = null;

        $products = Product::where('shop_id', $shops->id)->get();

        return view('seller.dashboard', [
            'shops' => $shops,
            'users' => $users,
            'orders' => $orders,
            'seller' => $seller,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seller= Auth::user();
        $shops = Shop::where('user_id', $seller->id)->first();
        return view('seller.products.create', ['shop' =>  $shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ //inputs are not empty or null
            'name' => 'required',
        ]);

        $productDetails = new ProductDetails();
        $productDetails->name = 'Nike air Force';
        $productDetails->description = 'Descrription de Nike air Force';
        $productDetails->save();

        $product = new Product();
        $product->product_type = $request->input('');
        $product->sku = rand(0, 999999);
        $product->slug = Str::slug($product->sku.'-'.$request->input('name'), '-');
        $product->product_image = '/path/to/img';
        $product->product_details_id = $productDetails->id;
        $product->price = '12000';
        $product->discount_price = '12000';
        $product->unit_id = 1;
        $product->status = 'unpublished';
        $product->shop_id = 3;
        $product->tax_id = 1;
        $product->product_views = 1;
        $product->is_featured = 0;
        $product->save();

        $gallery = new Gallery();
        $gallery->product_id = $product->id;
        $gallery->image = $product->id;
        $gallery->ext = 'image/jpeg';
        $gallery->save();

        $measurements = new Measurement();
        $measurements->product_id = $product->id;
        $measurements->qts = 100;
        $measurements->save();

        $inventory = new Inventory();
        $inventory->qts = 20;
        $inventory->product_id = 4;
        $inventory->shop_id = 3;
        $inventory->save();

        dd($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
