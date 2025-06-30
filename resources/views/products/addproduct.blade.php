{{-- @extends('layouts.master')

@section('content')
        <div class="m-auto  py-12 px-4">
            <h1 class="text-2xl font-bold mb-6 text-center">Neues Produkt hinzufügen</h1>
    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="form-title">
            </div>
            <div class="form_status"></div>
            <div class="contact">
                <form type="POST" action="/storeproduct"valid_datas(this);">
                    <p>
                        <input type="text" style="width:100%"placeholder="Name" name="name" id="name">

                    </p>
                    <br>
                    <p style="display:flex;">
                        <input type="number" style="width:50%"  class="mr-4"  placeholder="Price" name="price" id="price">
                        <input type="number" style="width:50%" placeholder="Quantity" name="quantity"id="quantity">
                       
                    </p>
                    <br>
                    <p>
                        <p><textarea name="description" id="description" style="width:100%;" cols="30" rows="10" placeholder="Description"></textarea></p>
                       <p><input type="submit"value="Submit"> </p>
                </form>
            </div>
        </div>
    </div>
    </div>


        </div>
@endsection --}}


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

            <label class="block mb-2 font-semibold">Beschreibung:</label>
            <textarea name="description" class="w-full mb-4 p-2 border rounded" required>{{ old('description') }}</textarea>

            <label class="block mb-2 font-semibold">Preis (€):</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full mb-4 p-2 border rounded"
                required>

            <label class="block mb-2 font-semibold">Menge:</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full mb-4 p-2 border rounded"
                required>

            <label class="block mb-2 font-semibold">Bild:</label>
            <input type="file" name="imagepath" class="w-full mb-4" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Produkt speichern
            </button>
        </form>
    </div>
@endsection