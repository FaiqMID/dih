<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'telephone' => ''
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user_id = User::create($validatedData)->id;

        $user_address = new UserAddress();
        $user_address->user_id = $user_id;
        $user_address->name = $validatedData['name'];
        $user_address->save();
        //dd($validatedData);
        return redirect()->intended('/');
    }
}