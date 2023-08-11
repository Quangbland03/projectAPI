<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexHome()
    {
        $categoryId = Category::where('name', 'Điện thoại')->value('id');

        $show = Product::where('category_id', $categoryId )->get();

        return response()->json($show);
    }

    public function indexSmart() {
        $list = Product::all(); 
        return response()->json($list);
    }

    public function indexCamera() {
        $list = Product::all(); 
        return response()->json($list);
    }

    public function indexAccessories() {
        $list = Product::all(); 
        return response()->json($list);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
