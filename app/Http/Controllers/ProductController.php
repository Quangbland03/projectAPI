<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
    public function indexHome(Request $request)
    {

        $product = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as name1')
            ->get();

        return response()->json($product);
    }

    public function indexLaptop()
    {
        $categoryId = Category::where('name', 'Laptop')->value('id');

        $show = Product::where('category_id', $categoryId)->get();

        return response()->json($show);
    }

    public function indexSmart()
    {
        $categoryId = Category::where('name', 'Smart Phone')->value('id');

        $show = Product::where('category_id', $categoryId)->get();

        return response()->json($show);
    }
    public function indexCamera()
    {
        $categoryId = Category::where('name', 'Camera')->value('id');

        $show = Product::where('category_id', $categoryId)->get();

        return response()->json($show);
    }
    public function indexAccessories()
    {
        $categoryId = Category::where('name', 'Accessorie')->value('id');

        $show = Product::where('category_id', $categoryId)->get();

        return response()->json($show);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        if($request->has('productImage')){
            $file = $request->productImage;
            $file_name= $file->getClientOriginalName();
            $file->move(public_path('img'), $file_name);
        }
        $request->merge(['image'=>$file_name]);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'description' => 'required|string|min:8',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 422]);
        }
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id')
        ]);

        if ($product->save()) {
            return response()->json(['message' => 'Product added successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to add product'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {

    //     $product = Product::where('id', $id)->first();

    //     $key = Auth::id();
    //      $responseData = [
    //     'product' => $product,
    //     'key' => $key,
    // ];
    //     return response()->json(  $responseData );
    // // $key = Auth::id();


    // // return view('admin.ok', compact('key'));
    // }

    public function show(string $id)
    {
        // Lấy thông tin sản phẩm dựa trên ID
        $product = Product::findOrFail($id);

        // Lấy thông tin người dùng đã xác thực (user đang đăng nhập)
        $users = Auth::user();

        // Khởi tạo biến lưu trữ user_id
        $userId = null;

        // Nếu người dùng đã xác thực, lấy user_id
        if ($users) {
            $userId = $users->id;
        }

        // Chuẩn bị dữ liệu để trả về
        $responseData = [
            'product' => $product,
            'user_id' => $userId,
        ];

        // Trả về JSON chứa thông tin sản phẩm và user_id
        return response()->json($responseData);
    }

    public function show1(string $id)
    {


        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => 422]);
        }

        $product = Product::findOrFail($id);


        $updated = $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id')
        ]);

        if ($updated) {
            return response()->json(['message' => 'Product updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to update product'], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        $response = [
            'status' => 'success',
            'message' => 'Product deleted successfully',
        ];
        return response()->json($response);
    }

    public function search(Request $request)
    {

        $name = $request->input('name'); // Get the 'name' parameter from the POST request

        // Use Eloquent's where() method to search by name and join with categories table
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.name', 'LIKE', '%' . $name . '%')
            ->get();

        // Return the results as JSON
        return response()->json($products);
    }
}
