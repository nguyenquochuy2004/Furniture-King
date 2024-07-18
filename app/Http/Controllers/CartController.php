<?php

namespace App\Http\Controllers;
use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Cart $cart){
        // $cartItem = $cart ->list();
        return view('fe.cart',compact('cart'));
        
    }

    public function add(Request $request, Cart $cart){
        $product = Product::find( $request->id);
        $quantity = $request-> quantity;
        $cart -> add($product, $quantity);
        return redirect()->route('cart.index');
    }

    public function deleteCart($id, Cart $cart)
    {
        $cart->delete($id);
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
    // public function deleteCart($id)
    // {
    //     Cart::remove($id); // Xóa sản phẩm khỏi giỏ hàng bằng ID
    //     return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    // }
}
