@extends('layouts.master')

@section('content')
    <div class="max-w-2xl mx-auto py-10">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Zur Kasse</h1>

            <!-- Bestellübersicht -->
            <h2 class="text-lg font-semibold mb-4">Bestellübersicht</h2>
            <table class="min-w-full text-sm mb-6">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 text-right">image</th>
                        <th class="p-2 text-right">Produkt</th>
                        <th class="p-2 text-center">Menge</th>
                        <th class="p-2 text-left">Preis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartProducts as $item)
                        <tr class="border-b">
                            <td class="p-2">
                                <img src="{{ asset('images/' . $item['imagepath']) }}" alt="{{ $item['name'] }}"
                                    class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="p-2 align-middle font-semibold"><a href="/single-product/{{ $item['id'] }}">
                                    {{ $item['name'] }} </a> </td>
                            <td class="p-2 align-middle text-center">
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST"
                                    class="flex items-center justify-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                        class="qty-input w-14 text-center border rounded" />
                                    <button type="submit"
                                        class="qty-btn px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs">Aktualisieren</button>
                                </form>
                            </td>
                            <td class="p-2 align-middle text-right">{{ number_format($item['price'], 2, ',', '.') }} €</td>
                            <td class="p-2 align-middle text-right font-semibold total-price">
                                {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }} €
                            </td>
                            {{-- <td class="p-2 align-middle text-right">{{number_format($item->product->price * $item->quantity, 2)}}€</td>
                            --}}
                            <td class="p-2 align-middle text-center">
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="remove-btn text-red-600 hover:text-red-800 text-xl"
                                        title="Entfernen">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Kundendaten -->
            <h2 class="text-lg font-semibold mb-4">Kundendaten</h2>
            <form action="{{ route('stripe.checkout') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1">Vollständiger Name</label>
                    <input type="text" name="name" class="border rounded w-full p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1">E-Mail-Adresse</label>
                    <input type="email" name="email" class="border rounded w-full p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Adresse</label>
                    <input type="text" name="address" class="border rounded w-full p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Stadt</label>
                    <input type="text" name="city" class="border rounded w-full p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Telefonnummer</label>
                    <input type="text" name="phone" class="border rounded w-full p-2" required>
                </div>

                <!-- Zahlungsmethode -->
                <h2 class="text-lg font-semibold mb-4">Zahlungsmethode</h2>
                <div class="mb-4">
                    <label class="inline-flex items-center mr-4">
                        <input type="radio" name="payment_method" value="credit_card" required>
                        <span class="ml-2">Kreditkarte</span>
                    </label>
                    <label class="inline-flex items-center mr-4">
                        <input type="radio" name="payment_method" value="paypal">
                        <span class="ml-2">PayPal</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="payment_method" value="cod">
                        <span class="ml-2">Barzahlung bei Lieferung</span>
                    </label>
                </div>

                <!-- Kostenübersicht -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="flex justify-between mb-2">
                        <span>Zwischensumme:</span>
                        <span>{{ number_format($subtotal, 2, ',', '.') }} €</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Versandkosten:</span>
                        <span>{{ number_format($shipping, 2, ',', '.') }} €</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Gesamtbetrag:</span>
                        <span>{{ number_format($total, 2, ',', '.') }} €</span>
                    </div>
                </div>
                <!-- ... Kostenübersicht ... -->
                <button type="submit"
                    class="w-full py-3 bg-green-600 text-white rounded font-bold text-lg hover:bg-green-700 transition">
                    Bestellung abschließen
                </button>


                <!-- Rechtliches -->
                <div class="mb-6 text-sm text-gray-600">
<br>
                     <a href="#agb"
                            class="underline text-l">AGB</a>,
                            <br>
                             <a href="#datenschutz" class="underline  text-l">Datenschutzerklärung</a> <br> 
                        <a href="#widerruf" class="underline text-l">Widerrufsbelehrung</a>.
                </div>
               </form>
                <!-- Absenden -->

        </div>
    </div>
@endsection