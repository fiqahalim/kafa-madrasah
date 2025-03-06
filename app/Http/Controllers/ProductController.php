<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request, ?Product $product = null)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $data = $request->all();
        if ($product) {
            $product->update($data);

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } else {
            Product::create($data);

            return redirect()->route('products.index')->with('success', 'Product added successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
