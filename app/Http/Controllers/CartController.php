<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $productQty = $request->input('qty');

        $product = Product::findOrFail($productId);

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $productId => [
                    "name" => $product->name,
                    "quantity" => $productQty,
                    "price" => $product->price
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $productQty;
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product quantity updated in cart successfully!']);
        }

        $cart[$productId] = [
            "name" => $product->name,
            "quantity" => $productQty,
            "price" => $product->price
        ];

        session()->put('cart', $cart);
        
        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!']);
    }

    public function checkout()
    {
        $cart=Session::get('cart');

       return view('products.cart',compact('cart'));
    }
}
