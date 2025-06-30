<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // Zeige die Checkout-Seite an
    public function showCheckout()
    {
        $cartProducts = session('cart', []);

        // Prüfen, ob der Warenkorb leer ist
        if (empty($cartProducts)) {
            return redirect()->route('products.index')->with('info', 'Dein Warenkorb ist leer.');
        }

        $subtotal = collect($cartProducts)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal >= 50 ? 0 : 5;
        $total = $subtotal + $shipping;

        return view('order', compact('cartProducts', 'subtotal', 'shipping', 'total'));
    }

    // Verarbeite das Formular und speichere die Bestellung
    public function submitOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cartProducts = session('cart', []);

        // Prüfen, ob der Warenkorb leer ist (Sicherheits-Check)
        if (empty($cartProducts)) {
            return redirect()->route('products.index')->with('info', 'Dein Warenkorb ist leer.');
        }

        $subtotal = collect($cartProducts)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = $subtotal >= 50 ? 0 : 5;
        $total = $subtotal + $shipping;

        $order = Order::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'address'        => $request->address,
            'city'           => $request->city,
            'phone'          => $request->phone,
            'payment_method' => $request->payment_method,
            'subtotal'       => $subtotal,
            'shipping'       => $shipping,
            'total_amount'   => $total,
        ]);

        // Speichere die Bestellpositionen
        foreach ($cartProducts as $productId => $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'product_name' => $item['name'],
                'quantity'     => $item['quantity'],
                'unit_price'   => $item['price'],
                'total_amount' => $item['quantity'] * $item['price'],
            ]);
        }

        // Leere den Warenkorb
        Session::forget('cart');

        // Weiterleitung zur Dankesseite (mit Order-ID!)
        return redirect()->route('order.thankyou', ['orderId' => $order->id]);
    }

    // Zeige die Dankesseite nach der Bestellung
    public function thankYou($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('cart.success', compact('order'));
    }
}
