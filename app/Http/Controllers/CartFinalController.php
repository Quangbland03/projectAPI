<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;

class CartFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $userId = Auth::id();
        $listcart = Cart::join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.id as cart_id', 'carts.quantity', 'products.image', 'products.name', 'products.price')
        ->where('carts.user_id', '=',   7)
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
    try {
        $userId = Auth::id();

        $cartItem = new Cart([
            'quantity' => $request->input('quantity'),
            'user_id' => $userId,
            'product_id' => $request->input('product_id'),
        ]);

        $cartItem->save();

        // Kiểm tra lại user_id và bao gồm nó trong JSON response
        $cartItem->refresh(); // Cập nhật đối tượng sau khi lưu để lấy user_id mới
        return response()->json(['message' => 'Product added successfully', 'user_id' => $cartItem->user_id], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to add product to cart'], 500);
    }

}

    public function getid()
    {
        $userId = Auth::id();

        return response()->json($userId );
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
