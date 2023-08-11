<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexHome()
    {
        $show = Product::all();

        return response()->json($show);
    }

    public function indexSmart() {
        $categoryId = Category::where('name', 'Smart Phone')->value('id');

        $show = Product::where('category_id', $categoryId )->get();

        return response()->json($show);
    }
    public function indexCamera() {
        $categoryId = Category::where('name', 'Camera')->value('id');

        $show = Product::where('category_id', $categoryId )->get();

        return response()->json($show);
    }
    public function indexAccessories() {
        $categoryId = Category::where('name', 'Accessorie')->value('id');

        $show = Product::where('category_id', $categoryId )->get();

        return response()->json($show);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $product = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
        ->select('products.*', 'product_details.*')
        ->where('products.id', $id)
        ->first();

    return response()->json($product);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
