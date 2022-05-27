<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $allDataDetails = [];

        $allDataDetails['cart'] = CartHelper::getCart();

        if ($user = Auth::user()) {
            $userName = $user->name;
        }
        return view('frontend.cartlist',compact('allDataDetails','userName'));
    
    }

    public function addToCart(Request $request)
    {
        $productId = $request->id;
        $quantity = $request->quantity;

        // Get the product amount and cart quantities
        $product = Product::findOrFail($productId);
        $price = $product->price;
        $totalAmount = cart()->toArray()['subtotal'];
        $cartProductQuantity = CartHelper::getProductQuantity($productId);

        // This is when we try to add item from product listing
        if (!$quantity) {
            $quantity = $cartProductQuantity + 1;
        }

        $productTotalPrice = ($quantity * $price);

        if ($cartProductQuantity === 0) {
            // If - We are adding a new cart item
            $totalAmount += $productTotalPrice;
        } else {
            // If already exists - based on the existing quantity - we calculate the total
            $totalAmount += ($quantity * $price) - ($cartProductQuantity * $price);
        }

        CartHelper::setCartItemQuantity($productId, $quantity);

         response()->json([
            'cart' => $this->getCart(),
            'count' => CartHelper::getCartCount(),
            'cartSound' => intval($quantity) >= $cartProductQuantity ? 'happy' : 'sad', // If we update more than cart item happy sound
        ]);

    }

    public function removeFromCart($productId)
    {
        CartHelper::removeFromCart($productId);
        return response()->json($this->getCart());
    }

    public function getCart()
    {
        return CartHelper::getCart();
    }

    public function cartItems()
    {
        $cart = CartHelper::getCart();
        $items = $cart->items;

        return response()->json([
            'cart' => $cart,
            'count' => CartHelper::getCartCount(),
            'content' => view('frontend.carts.items', compact('items', 'cart'))->render(),
            'cart_items_content' => view('frontend.carts.partials._cart_items', compact('items', 'cart'))->render(),
            'cart_payment_content' => view('frontend.carts.partials._cart_payment', compact('items', 'cart'))->render(),
            'cart_checkout_items' => view('frontend.orders.partials._checkout_items', compact('items', 'cart'))->render()
        ]);
    }
}
