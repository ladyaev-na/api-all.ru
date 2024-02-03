<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Models\Cart;
use App\Models\Order;
use App\Models\orderList;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

    }

    public function show(){

    }

    public function checkout(Request $request){
        $user_id = $request->user()->id;


        $carts = Cart::where('user_id','=', $user_id)->get();

        foreach ($carts as $cart){
            $product = Product::find($cart->product_id);
            if ($cart->quantity < $cart->quantity){
                throw new ApiException(500,'Все сломано');
            }
        }

        $order = new Order(['user_id' => $user_id]);
        $order->save();

        foreach ($carts as $cart){
            $product = Product::find($cart->product_id);
            $newOrderlists = new orderList();
            $newOrderlists->order_id = $order->id;
            $newOrderlists->product_id = $cart->product_id;
            $newOrderlists->quantity = $cart->quantity;
            $newOrderlists->price = $product->price;
            $newOrderlists->save();
            $product->quantity -= $cart->quantity;
            $product->save();
        }

        Cart::where('user_id',$user_id)->delete();
        return response()->json($order)->setStatusCode(200,'Заказ оформлен');
    }
}
