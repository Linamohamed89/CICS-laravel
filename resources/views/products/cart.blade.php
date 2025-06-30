@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-6 flex items-center gap-4 justify-center text-center">
                🛒 Dein Warenkorb
            </h1>


            @if(count($cartProducts) === 0)
                <div class="text-gray-500 text-center py-10">
                    Dein Warenkorb ist leer.<br>
                    <a href="{{ route('products.index') }}" class="text-blue-600 underline">Jetzt Produkte entdecken</a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full cart-table text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2"></th>
                                <th class="p-2 text-left">Produkt</th>
                                <th class="p-2 text-center">Menge</th>
                                <th class="p-2 text-right">Einzelpreis</th>
                                <th class="p-2 text-right">Gesamtpreis</th>
                                <th class="p-2 text-center">Aktion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartProducts as $item)
                                <tr class="border-b">
                                    <td class="p-2">
                                        <img src="{{ asset('images/' . $item['imagepath']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                                    </td>
                                    <td class="p-2 align-middle font-semibold"><a href="/single-product/{{ $item['id'] }}">
                                        {{ $item['name'] }}  </a> </td>
                                    <td class="p-2 align-middle text-center">
                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="flex items-center justify-center gap-2">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                                class="qty-input w-14 text-center border rounded" />
                                            <button type="submit" class="qty-btn px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs">Aktualisieren</button>
                                        </form>
                                    </td>
                                    <td class="p-2 align-middle text-right">{{ number_format($item['price'], 2, ',', '.') }} €</td>
                                    <td class="p-2 align-middle text-right font-semibold total-price">
                                        {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }} €
                                    </td>
                                    {{-- <td class="p-2 align-middle text-right">{{number_format($item->product->price * $item->quantity, 2)}}€</td> --}}
                                    <td class="p-2 align-middle text-center">
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="remove-btn text-red-600 hover:text-red-800 text-xl" title="Entfernen">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Bestellübersicht -->
                <div class="summary-box bg-gray-50 rounded-lg p-4 mt-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-medium">Zwischensumme:</span>
                        <span id="subtotal">{{ number_format($subtotal, 2, ',', '.') }} €</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span>Versandkosten:</span>
                        <span>0,00 € <small class="text-gray-400">(ab 50 € kostenlos)</small></span>
                    </div>
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span>Gesamtbetrag:</span>
                        <span id="total">{{ number_format($subtotal, 2, ',', '.') }} €</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-2"><em>Alle Preise enthalten die gesetzliche Mehrwertsteuer.</em></p>
                </div>

                <!-- Weiterführende Aktionen -->
                <div class="flex gap-4 mt-6">
                            <a href="{{ route('products.index') }}"
                class="continue-shopping px-4 py-2 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition">
                🔗 Weiter einkaufen
                </a>

                    <a href="{{ route('order.stripe') }}" class="checkout-btn px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">✅ Zur Kasse gehen</a>
                </div>
            @endif

            <!-- Rechtliche Hinweise -->
            <div class="legal-hints mt-8 text-l text-gray-500">
                <p><strong>Hinweis:</strong> Bevor du zur Kasse gehst, beachte unsere:</p>
                <ul class="list-disc ml-6">
                    <li><a href="#widerruf" class="underline">Widerrufsbelehrung</a></li>
                    <li><a href="#agb" class="underline">Allgemeine Geschäftsbedingungen</a></li>
                    <li><a href="#datenschutz" class="underline">Datenschutzerklärung</a></li>
                </ul>
            </div>

            <!-- Footer Hinweis -->
            <footer class="cart-footer mt-6 text-center text-gray-400 text-xs">
                <p>Vielen Dank für deinen Besuch! Bei Fragen helfen wir dir gerne weiter.</p>
            </footer>
        </div>
    </div>
@endsection
