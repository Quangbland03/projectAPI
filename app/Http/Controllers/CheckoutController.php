<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


            try {
                $userId = Auth::id();

                $listcart = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->select('carts.quantity', 'products.name', 'products.price')
                ->where('carts.user_id', '=', $userId)
                ->get();


                return response()->json($listcart);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to add product to cart'], 500);
            }

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
        //
    }
}
