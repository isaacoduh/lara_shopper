<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        $product = Product::find(request()->pdt_id);

        

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => request()->quantity,
            'price' => $product->price
        ]);

        // dd($cart);
        // Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product added to cart.');

        return redirect()->route('cart');
    }

    public function cart(){
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);

        Session::flash('success', 'Product removed from cart.');
        return redirect()->back();
    }
}
