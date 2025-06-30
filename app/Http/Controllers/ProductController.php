<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.product', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

         
    }

//     public function byCategory(Category $category)
// {
//     $products = $category->products()->paginate(12);
//     $categories = Category::all();
//     return view('products.index', compact('products', 'categories', 'category'));
// }
   
    public function create()
    {

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'category_id' => 'required|exists:categories,id', // <--- HIER!
            'imagepath'   => 'sometimes|image|mimes:png,jpg,jpeg,svg,gif',
        ]);
        

        $input = $request->except('category_id');
        if ($image = $request->file('imagepath')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagepath'] = $profileImage;
        }

        $product = Product::create($input);
        $product->categories()->attach($request->category_id); // Mehrere Kategorien zuordnen

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {

//         $categories = Category::all();
// $selectedCategory = $product->category_id; // oder $product->category->id, wenn Beziehung geladen
// return view('products.edit', compact('product', 'categories', 'selectedCategory'));

$categories = Category::all();
$selectedCategories = $product->categories->pluck('id')->toArray();
return view('products.edit', compact('product', 'categories', 'selectedCategories'));


        // $categories = Category::all();
        // $selectedCategories = $product->categories->pluck('id')->toArray();
        // return view('products.edit', compact('product', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'required',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'imagepath'   => 'sometimes|image|mimes:png,jpg,jpeg,svg,gif',
        ]);

        $input = $request->except('category_id');
        if ($image = $request->file('imagepath')) {
            $destinationPath = public_path('images');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagepath'] = $profileImage;
        } else {
            unset($input['imagepath']);
        }

        $product->update($input);
        $product->categories()->sync($request->category_id); // Kategorien aktualisieren

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product); // prüft Policy
    
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produkt gelöscht!');
    }
    
    
}
