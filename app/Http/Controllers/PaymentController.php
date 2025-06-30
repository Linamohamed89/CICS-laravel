<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::retrieve($order->stripe_token);

        if ($session->payment_status == 'paid') {
            $order->update(['status' => 'Success']);
            return view('success', compact('order'));
        } else {
            $order->update(['status' => 'Failed']);
            return redirect()->route('fail', ['orderId' => $order->id]);
        }
    }

    public function fail($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'Failed']);
        return view('fail', compact('order'));
    }
}

