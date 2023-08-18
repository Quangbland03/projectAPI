<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listcart = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.id as cart_id', 'carts.quantity', 'products.image', 'products.name', 'products.price')
            ->where('carts.user_id', '=', 1)
            ->get();



        return response()->json($listcart);
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
        $cart = new Cart([

            'quantity' => $request->input('quantity'),
            'product_id' => $request->input('product_id')
        ]);
        $cart->save();

        return response()->json(['message' => 'Product added successfully'], 200);
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
        $cart = Cart::findOrFail($id);
        $cart->delete();
        $response = [
            'status' => 'success',
            'message' => 'Product deleted successfully',
        ];
        return response()->json($response);
    }
}
