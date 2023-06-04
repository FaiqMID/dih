<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        $address = UserAddress::where('user_id', Auth::user()->id)->first();

        return view('profile.index')->with(compact('user', 'address'));
    }

    public function edit(){
        $user = User::where('id', Auth::user()->id)->first();
        $address = UserAddress::where('user_id', Auth::user()->id)->first();

        return view('profile.edit')->with(compact('user', 'address'));
    }

    public function update(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $address = UserAddress::where('user_id', Auth::user()->id)->first();

        if($request->edit_type == "contact"){
            $request->validate([
                'email' => 'required|email:dns'
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        } else if ($request->edit_type == "address"){
            $address->name = $request->nama_penerima;
            $address->address = $request->alamat;
            $address->city = $request->kota;
            $address->province = $request->provinsi;
            $address->postal_code = $request->kode_pos;
            $address->save();
        }

        return redirect()->back()->with(compact('user', 'address'));
    }
}
