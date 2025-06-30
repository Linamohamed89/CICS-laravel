@extends('layouts.master')

@section('content')
  <div class="px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
    <div class="flex flex-wrap justify-between gap-3 p-4">
      <p class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight min-w-72">Entdecken Sie unsere
      Produkte
      </p>
    </div>
    <div class="pb-3">
      <div class="flex border-b border-[#cedbe8] px-4 gap-8">
      <!-- Filter-Buttons -->
      <!-- ... wie gehabt ... -->
      </div>
    </div>
    <h3 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Laptops</h3>
    <div class="flex justify-end mb-4">
      <a href="{{ route('products.create') }}"
      class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
      + Produkt anlegen
      </a>
    </div>

    <!-- Produktkarten unterhalb der Filter -->
    <div class="flex flex-col gap-6 mt-6">
      @foreach ($products as $item)
      <div class="product-card">
      <div class="product-labels"></div>
      <img class="product-image" src="{{ asset('images/' . $item->imagepath) }}" alt="{{ $item->name }}">
      <div class="product-info">
      <div class="product-main">
      <div class="product-title">{{$item->name}}</div>
      <div class="product-rating">★★★★★ <span>(8)</span></div>
      <div class="product-specs">
        <label>Prozessor:</label> <span>{{$item->description}}</span>
      </div>
      </div>
      <div class="product-actions">
      <div>
        <div class="product-pricing">
        <span class="product-price">{{$item->price}}€</span>
        </div>
        <div class="product-note">inkl. MwSt. versandkostenfrei</div>
        <br>
        <form action="{{ route('cart.add', $item->id) }}" method="POST" class="inline-block">
        @csrf
        <button type="submit" class="cart-btn px-9 bg-black text-white rounded hover:bg-gray-800 transition">
        In den Warenkorb
        </button>
        </form>

        <a href="{{ route('cart.show') }}">🛒 Zum Warenkorb</a>


        <!-- Button-Gruppe -->
        <div class="flex gap-2 mt-2">
        <a href="{{ route('products.show', $item->id) }}"
        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
        Anzeigen
        </a>
        <a href="{{ route('products.edit', $item->id) }}"
        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
        Bearbeiten
        </a>
        <form action="{{ route('products.destroy', $item->id) }}" method="POST"
        onsubmit="return confirm('Wirklich löschen?');" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
        Löschen
        </button>
        </form>

        </div>
      </div>
      </div>
      </div>
      </div>


    @endforeach

      {{ $products->links() }}

    </div>
    </div>
  </div>
@endsection