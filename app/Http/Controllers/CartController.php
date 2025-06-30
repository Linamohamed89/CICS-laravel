<?php



// class CartController extends Controller
// {
    // public function cart()
    // {
    //     $user_id = auth()->user()->id;
    //     $carts=Cart::where('user_id',$user_id)->get();
    //     return view ('products.cart',['cartProducts'=> $cartProducts]);

    // }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
        // 1. Warenkorb aus der Session holen
        $cart = session()->get('cart', []);
    
        // 2. Produktdaten aus der Datenbank holen
        $cartProducts = [];
        foreach ($cart as $productId => $item) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $cartProducts[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'imagepath' => $product->imagepath,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                ];
            }
        }
    
        // 3. HIER kommt die Berechnung der Zwischensumme:
        $subtotal = 0;
        foreach ($cartProducts as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
    
        // 4. View zurückgeben
        return view('products.cart', compact('cartProducts', 'subtotal'));

   }

    // public function checkout()
    // {
    //     // نأخذ بيانات السلّة من الجلسة (session)
    //     $cart = session()->get('cart', []);
    
    //     // نجهز بيانات المنتجات لنستخدمها في الصفحة
    //     $cartProducts = [];
    
    //     foreach ($cart as $id => $item) {
    //         $cartProducts[] = [
    //             'id' => $id,
    //             'name' => $item['name'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price'],
    //         ];
    //     }
    
    //     // نرسل البيانات إلى الصفحة
    //     return view('order', compact('cartProducts'));
    // }
  
    
    
  // App/Http/Controllers/CartController.php

//   public function showCart()
//   {
//       $cartProducts = session('cart', []); // Gibt immer ein Array zurück, nie null!
//       // ... Rest wie vorher
//       return view('cart', compact('cartProducts', 'subtotal'));
//   }
  


public function order()
{
    // مثلاً: عرض صفحة الطلب أو إعادة توجيه
    return view('order');
}



    public function update(Request $request, $productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = max(1, (int)$request->quantity);
            session()->put('cart', $cart);
        }
        return redirect()->route('products.cart');
    }


    public function add(Request $request, $productId)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $product = \App\Models\Product::find($productId);
        if ($product) {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'imagepath' => $product->imagepath,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
    }
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Produkt wurde zum Warenkorb hinzugefügt!');
}

    
    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return redirect()->route('products.cart');
    }



    
};
