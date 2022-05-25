<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function addToCart(Request $request)
    {
      
        // dd($request);

        // $product = Product::findOrFail($productId);

        return Product::addToCart(request('productId'));
    }

    public function removeFromCart()
    {
        return cart()->removeAt(request('cartItemIndex'));
    }
 
    public function incrementCartItem()
    {
        return cart()->incrementQuantityAt(request('cartItemIndex'));
    }

    public function decrementCartItem()
    {
        return cart()->decrementQuantityAt(request('cartItemIndex'));
    }

    public function cartItemQuantitySet()
    {
        return cart()->setQuantityAt(request('cartItemIndex'), request('cartQuantity'));
    }
    public function clearCart()
    {
        return cart()->clear();
    }
}
