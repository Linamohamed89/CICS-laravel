@extends('layouts.master')

@section('content')




    <div class="container mx-auto p-4 max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Produkt hinzufügen</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-200 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full mb-4 p-2 border rounded" required>

            <!-- HIER Kategorie-Auswahl einfügen -->
            <label for="category_id" class="block mb-2 font-semibold">Kategorien:</label>
            {{-- <select name="category_id[]" id="category_id" multiple required class="w-full mb-4 p-2 border rounded">
                <option value="">Bitte wählen</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : '' }}>

                        {{ $category->name }}
                    </option>
                @endforeach
            </select> --}}
            <select name="category_id" id="category_id" required class="w-full mb-4 p-2 border rounded">
                <option value="">Bitte wählen</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>


            {{-- <select name="category_id[]" id="category_id" multiple required class="w-full mb-4 p-2 border rounded">
                <option value="">Bitte wählen</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (collect(old('category_id'))->contains($category->id)) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select> --}}








            <label class="block mb-2 font-semibold">Beschreibung:</label>
            <textarea name="description" class="w-full mb-4 p-2 border rounded" required>{{ old('description') }}</textarea>

            <label class="block mb-2 font-semibold">Preis (€):</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full mb-4 p-2 border rounded"
                required>

            <label class="block mb-2 font-semibold">Menge:</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full mb-4 p-2 border rounded" required>

            <label class="block mb-2 font-semibold">Bild:</label>
            <input type="file" name="imagepath" class="w-full mb-4" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Produkt speichern
            </button>
        </form>

    </div>
@endsection


