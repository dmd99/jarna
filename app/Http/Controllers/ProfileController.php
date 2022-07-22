<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $address = UserAddress::where('user_id', Auth::user()->id)->first();
            return view('profile.index')->with('address', $address);
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->validate($request, [ // the new values should not be null
            'name' => 'required',
        ]);
        try {
            $user = User::findorFail($id);
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->save();
            return redirect()->back()->with('status', 'Utilisteur mis à jour avec success');
        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }

    public function updateAddress(Request $request, $id)
    {
        $this->validate($request, [
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'address1' => 'required',
        ]);
        //$isUserAddress = User::where('provider_id', $user->id)->first();
        try{
        $address = UserAddress::updateOrCreate(
            ['user_id' => $id],
            [
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'address_line1' => $request->input('address1'),
                'address_line2' => $request->input('address2'),
            ]
        );
        return redirect()->back()->with('status', 'Adresse mise à jour avec success');
        } catch (Exception $error) {
            return redirect('/')->with('error', $error->getMessage());
        }
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
