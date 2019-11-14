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

    public function increment($id, $quantity)
    {
        Cart::update($id, array(
            'quantity' => 1,
        ));

        Session::flash('success', 'Product quantity updated');

        return redirect()->back();
    }

    public function decrement($id, $quantity)
    {
        Cart::update($id, array(
            'quantity' => -1,
        ));

        Session::flash('success', 'Product quantity updated');

        return redirect()->back();
    }

    public function rapid_add($id)
    {
        $product = Product::find($id);

        $cartItem = Cart::add([
            'id'=> $product->id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price
        ]);

        Session::flash('success', 'Product added to cart');

        return redirect()->route('cart');
    }
}
