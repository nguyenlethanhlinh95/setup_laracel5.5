<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function index()
    {
        // get cart
        $cartItems = Cart::content();
        return view('front.cart.index', ['cartItems'=> $cartItems]);
    }

    public function addItem($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => $product->pro_price
            ]);
        echo $id;
    }

    public function destroy($id)
    {
        echo $id;
        Cart::remove($id);
        return back();
    }
}
