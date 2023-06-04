<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Events\OrderStatusChanged;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCheckout(Request $request){
		if(!empty($request->id_order)){
			$info_pembayaran = [
				'total' => $request->total,
				'id_order' => $request->id_order,
			];
		} else {
			\Cart::session(Auth::user()->id);

			
			if (\Cart::isEmpty()){
				return route('home');
			}

			
			$cartItems = \Cart::getContent();
			// dd($cartItems);
			$id_checkout = 0;

			//awikwok
			$user_address = UserAddress::where('user_id', Auth::user()->id)->first();
			$checkout_detail = new OrderDetail();
			$checkout_detail->user_address_id = $user_address->id;
			$checkout_detail->status = 0;
			$checkout_detail->total = \Cart::getTotal();
			$checkout_detail->save();
			$id_checkout = $checkout_detail->id;

			//cek orderitems apa dah ada apa blom, klo blom maka bikin
			foreach ($cartItems as $item) {
				$cek_item_checkout = OrderItem::where('product_id', $item->id)->where('order_detail_id', $id_checkout)->first();
				if(empty($cek_item_checkout))
				{
					$order_item = new OrderItem();
					$order_item->product_id = $item->id;
					$order_item->order_detail_id = $id_checkout;
					$order_item->quantity = $item->quantity;
					$order_item->price = $item->quantity*$item->price;
					$order_item->discount_amount = 0;
					$order_item->save();
				}
			}
			$info_pembayaran = [
				'total' => $checkout_detail->total,
				'id_order' => $id_checkout
			];
			
			\Cart::clear();
			event(new OrderStatusChanged($checkout_detail));
		}
		
		return view('order.payment')->with('info_pembayaran', $info_pembayaran);
    }

	public function showOrders(){
		$user_address_id = UserAddress::where('user_id', Auth::user()->id)->first();
		$orders = OrderDetail::where('user_address_id', $user_address_id->id)->with('orderitem.product')->get();
					// ->join('order_items', 'order_details.id', '=', 'order_items.order_detail_id')
					// ->join('products', 'order_items.product_id', '=', 'products.id')
					// ->get(); // eloquent malah ribet >:(
		
		// $order_items = OrderItem::with(['orderdetail'])->orderDetail()->get();
		// $products = Product::where('id', order_item)->get();
		// dd(compact('orders'));
		// dd($orders);
		
		
		if ($orders->count() < 1){
			return view('order.orders');
		}

		return view('order.orders', compact('orders'));
	}

	public function index(){
		$orders = OrderDetail::with('orderitem.product')->get();
		if ($orders->count() < 1){
			return view('order.index');
		}

		return view('order.index', compact('orders'));
	}

	public function update(Request $request){
		$order = OrderDetail::where('id',$request->id_order)->first();
		$order->status += 1;
		$order->save();

		event(new OrderStatusChanged($order));
		
		return redirect('/orders/list');
	}

	public function pay(Request $request){
		$order = OrderDetail::where('id',$request->id_order)->first();
		$order->status = 1;
		$order->save();

		event(new OrderStatusChanged($order));

		return redirect('/orders');
	}
}
