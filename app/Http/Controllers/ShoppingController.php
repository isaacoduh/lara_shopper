<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        $product = Product::find(request()->pdt_id);

        

        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => request()->quantity,
            'price' => $product->price
        ]);

        // dd($cart);

        dd(Cart::getContent());
    }
}
