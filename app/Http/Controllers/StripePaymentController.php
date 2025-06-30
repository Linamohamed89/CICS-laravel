<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class StripePaymentController extends Controller
{
    public function checkout(Request $request)
    {
        // Validierung wie gehabt
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            // ... weitere Felder
        ]);

        // Hole Warenkorb aus Session
        $cartProducts = session('cart', []);
        $lineItems = [];
        foreach ($cartProducts as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => intval($item['price'] * 100), // Cent!
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Versandkosten als eigenes Produkt (optional)
        $subtotal = collect($cartProducts)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal >= 50 ? 0 : 500; // Cent!
        if ($shipping > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Versand',
                    ],
                    'unit_amount' => $shipping,
                ],
                'quantity' => 1,
            ];
        }

        // Stripe initialisieren
        Stripe::setApiKey(config('services.stripe.secret'));

        // Session-Daten für später merken
        Session::put('order_data', $request->all());

        // Stripe Checkout-Session erstellen
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
            'customer_email' => $request->email,
        ]);

        // Weiterleitung zu Stripe
        return redirect($session->url);
    }

    public function success(Request $request)
    {
        // Order-Daten und Warenkorb aus Session holen
        $orderData = Session::get('order_data');
        $cartProducts = session('cart', []);
        $subtotal = collect($cartProducts)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal >= 50 ? 0 : 5;
        $total = $subtotal + $shipping;

        // Order speichern wie gehabt
        $order = \App\Models\Order::create([
            'name'           => $orderData['name'],
            'email'          => $orderData['email'],
            'address'        => $orderData['address'],
            'city'           => $orderData['city'],
            'phone'          => $orderData['phone'],
            'payment_method' => 'stripe',
            'subtotal'       => $subtotal,
            'shipping'       => $shipping,
            'total_amount'   => $total,
        ]);
        foreach ($cartProducts as $productId => $item) {
            \App\Models\OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'product_name' => $item['name'],
                'quantity'     => $item['quantity'],
                'unit_price'   => $item['price'],
                'total_amount' => $item['quantity'] * $item['price'],
            ]);
        }
        // Warenkorb leeren
        Session::forget('cart');
        Session::forget('order_data');

        return view('success', compact('order'));
    }

    public function cancel()
    {
        return view('stripe-cancel');
    }
}
