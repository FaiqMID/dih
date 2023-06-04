<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function index()
    // {
    //     $cart = session()->get('cart');
    //     if ($cart == null)
    //         $cart = [];

    //     return view('cart')->with('cart', $cart);
    // }

    

    public function cartList(){
        \Cart::session(Auth::user()->id);
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }    
    
    public function addToCart(Request $request){
        if ($request->checkout_type == "Beli Langsung") {            
            return redirect()->route('checkout', $request->all());
        } else {
            \Cart::session(Auth::user()->id)->add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->image,
                )
            ]);
            session()->flash('success', 'Product is Added to Cart Successfully !');
            return redirect()->route('cart.list');
        }

    }    
    
    public function updateCart(Request $request){
        \Cart::session(Auth::user()->id)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('cart.list');
    }    
    
    public function removeCart(Request $request){
        \Cart::session(Auth::user()->id)->remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }    
    
    public function clearAllCart(){
        \Cart::session(Auth::user()->id)->clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }
}