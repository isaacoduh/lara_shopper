<?php

namespace App\Http\Controllers;

use Mail;
use Cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::getContent()->count() == 0)
        {
            Session::flash('info', 'Your cart is still empty. Do some shopping');
            return redirect()->back();
        }

        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey("sk_test_UjCD2kLt6KIOevQyMSHBXc2M00PnxwK3GU");

        $charge = Charge::create([
            'amount' => Cart::getTotal() * 100,
            'currency' => 'usd',
            'description' => 'Larashopper Demo Ecommerce',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase Successful. Wait for our confirmation mail');

        Cart::clear();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
