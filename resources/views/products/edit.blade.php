@extends('layouts.master')

@section('content')
    <div class="container mx-auto p-4 max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Produkt bearbeiten</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-200 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full mb-4 p-2 border rounded"
                required>

            <label for="category_id" class="block mb-2 font-semibold">Kategorie:</label>
            {{-- <select name="category_id" id="category_id" required class="w-full mb-4 p-2 border rounded">
                <option value="">Bitte wählen</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select> --}}

            <select name="category_id[]" multiple ...>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>



            <label class="block mb-2 font-semibold">Beschreibung:</label>
            <textarea name="description" class="w-full mb-4 p-2 border rounded"
                required>{{ old('description', $product->description) }}</textarea>

            <label class="block mb-2 font-semibold">Preis (€):</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                class="w-full mb-4 p-2 border rounded" required>

            <label class="block mb-2 font-semibold">Menge:</label>
            <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                class="w-full mb-4 p-2 border rounded" required>

            <label class="mb-2 font-semibold">Bild:</label>
            <input type="file" name="imagepath" class="w-full mb-4">
            @if($product->imagepath)
                <div class="mb-4">
                    <img src="{{ asset('images/' . $product->imagepath) }}" alt="Produktbild" class="h-24 rounded">
                </div>
            @endif

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Änderungen speichern
            </button>
        </form>
    </div>
@endsection