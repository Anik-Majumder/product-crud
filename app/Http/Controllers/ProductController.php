<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $stockStatus = $request->query('stock', null);

        if ($stockStatus == 'instock') {
            $products = Product::where('stock', 'instock')->get();
        } elseif ($stockStatus == 'stockout') {
            $products = Product::where('stock', 'stockout')->get();
        } else {
            $products = Product::get();
        }


        return view('pages.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // image url

        $path = $request->file('image');

        $img = $path ? $path->store('img', 'public') : null;

        Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $request->status,
            'stock' => $request->stock,
            'image' => $img
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return view('pages.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $request->status,
            'stock' => $request->stock,
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Product::find($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);

        }





        Product::where('id', $id)->delete();


        return redirect()->route('home');
    }
}
