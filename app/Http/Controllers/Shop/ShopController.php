<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::with('user')->get();
        $users = User::with('shop')->get();
        return view('admin.shop.index', [
            'shops' => $shops,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.shop.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->file('image')->store('/public/shop/');
            $slug = Str::slug(rand(0, 99999) . '-' . $request->input('name'), '-');
            $shop = new Shop;
            $shop->slug = $slug;
            $shop->name = $request->input('name');
            $shop->image = $request->file('image')->store('/public/shop/');
            $shop->description = $request->input('description');
            $shop->phone = $request->input('phone');
            $shop->user_id = $request->input('datalistOptions');
            $shop->is_featured = 0;
            $shop->color = '#D1E8F2';
            $shop->save();

            return redirect()->back()->with('status', 'Boutique créée avec success');
        } catch (Exception $error) {
            return redirect()->back()->with('status', $error->getMessage());
        }
        /*$data = [
            $request->input('name'),
            $request->file('image')->store('public/shop/images'),
            $request->input('description'),
            $request->input('phone'),
            $request->input('featured'),
            $request->input('datalistOptions'),
        ];
        dd($data);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::where('id', $id)->with('user')->get()->first();
        return view('admin.shop.show', ['shop' => $shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::with('user')->where('id', $id)->first();
        $users = User::all();
        return view('admin.shop.edit', ['shop' => $shop, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shop)
    {
        $shopImage= $request->file('image')->store('/public/shop');
        $shopImagePath = $request->file('image')->hashName('shop');
        $shop = Shop::updateOrCreate(
            ['id' => $shop],
            [
                'name'=> $request->input('name',''),
                'image'=> $shopImagePath,
                'description'=> $request->input('description'),
                'phone'=> $request->input('phone'),
                'is_featured'=> '1',
                'color'=> '#D1E8F2'
            ]
        );
        // dd($request->file('image')->store('/public/shop/images'));
        // $shop->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findorFail($id); //searching for object in database using ID
        if ($shop->delete()) { //deletes the object
            return redirect('/a/shops')->with('status', 'deleted successfully'); //shows a message when the delete operation was successful.
        }
    }

    public function shop()
    {
        $shops = Shop::with('user')->get();
        $users = User::with('shop')->get();
        return view('shop.index', [
            'shops' => $shops,
            'users' => $users,
        ]);
    }

    public function showShop($id)
    {
        $shop = Shop::with('user')->findOrFail($id);
        return view('shop.show', [
            'shop' => $shop,
        ]);
    }
}
