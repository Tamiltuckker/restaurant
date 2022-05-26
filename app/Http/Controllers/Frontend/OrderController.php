<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CartHelper;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request)
    {
       
        $user = Auth::user();
        // Check the user has a User
        if (!$user) {
            throw ValidationException::withMessages(["This user doesn't have user"]);
        }

        $cartData = CartHelper::getCart();
        
        // Check the cart has items
        if (!$cartData->items) {
            throw ValidationException::withMessages(["There is no items in the cart"]);
        }

        // Create a new order
        $order = new Order();
        $order->total_amount = $cartData->total;
        $order->user_id = $user->id;        
        $order->save();

        // Create order items
        foreach ($cartData->items as $item) {
            $orderItem = new OrderItem();

            $orderItem->product_id = $item['modelId'];
            $orderItem->qty = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->total_amount = $item['total'];

            $order->orderItems()->save($orderItem);
        }  
        $this->orderClearCart();
        $data = response()->json($order);
        return redirect()->route('cart.list')->with('success', 'Your place Order has been successfully Complated');  

    }

    public function orderClearCart()
    {
        // Clear the cart
        CartHelper::clearCart();

        // flash("Thanks for your order!")->success();
        return redirect()->route('cart.list')->with('success', 'Thanks for your order!');  

    }
}
