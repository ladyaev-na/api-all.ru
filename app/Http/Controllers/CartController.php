<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CartCreateReuest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) {

        $carts = Cart::where('user_id','=', $request->user()->id)->get();
        return response()->json(CartResource::collection($carts))->setStatusCode(200, 'Успешно');

    }

    public function create(CartCreateReuest $request, $id) {

        $product = Product::find($id);
        if (!$product){
            throw new ApiException(100, 'Товар не существует');
        }

        if ($product->quantity < $request->quantity){
            throw new ApiException(100, 'Недостаточно товара');
        }

        $user_id = $request->user()->id;
        $cart = Cart::updateOrCreate([
            'user_id' => $user_id,
            'product_id' => $id,
            'quantity' => $request->quantity
        ]);
        return response()->json($cart)->setStatusCode(200,'Добавлено');
    }

    public function destroy(Request $request,$id){
        $cart = Cart::where('user_id','=',$request->user()->id)->where('id','=',$id)->first();
        if ($cart){
            $cart->delete();
            return response()->json('Товар удален изкарзины')->setStatusCode(200, 'Удален');
        }else{
            return response()->json('Товар в корзине не найден')->setStatusCode(404, 'Не найдено');
        }
    }
}
