<?php

namespace App\Http\Helpers;

use App\Models\Product;
use Illuminate\Support\Arr;

class CartHelper
{
    /**
     * Gets Cart and Cart Items.
     *
     * @return object
     */
    public static function getCart()
    {
        $cart = (object) cart()->toArray();

        if ($items = $cart->items) {
            // Sort the items by the product name
            $sorted = Arr::sort($items, function ($value) {
                return strtolower($value['name']);
            });

            $cart->items = array_map(function ($val) {
                $val[strtolower(class_basename($val['modelType']))] = call_user_func_array([$val['modelType'], "find"], [$val['modelId']]);
                $val['total'] = $val['quantity'] * $val['price'];

                return $val;
            }, $sorted);
        }

        return $cart;
    }

    /**
     * Gets Cart Items.
     *
     * @return mixed
     */
    public static function getCartItems()
    {
        return self::getCart()->items;
    }

    /**
     * Add to Cart.
     *
     * @param $productId
     * @param int $quantity
     */
    public static function addToCart($productId, int $quantity = 1)
    {
        if (self::hasProduct($productId) === false) {
            Product::addToCart($productId, $quantity);
        } else {
            self::setCartItemQuantity($productId, $quantity);
        }
    }

    /**
     * Gets Cart Count.
     *
     * @return int
     */
    public static function getCartCount()
    {
        return count(self::getCartItems());
    }

    /**
     * Increment cart item quantity.
     *
     * @param $index
     * @return mixed
     */
    public static function incrementCartItem($index)
    {
        return cart()->incrementQuantityAt($index);
    }

    /**
     * Decrement cart item quantity.
     *
     * @param $index
     * @return mixed
     */
    public static function decrementCartItem($index)
    {
        return cart()->decrementQuantityAt($index);
    }

    /**
     * Removes Product using Index from Cart.
     *
     * @param $productId
     */
    public static function removeFromCart($productId)
    {
        $index = self::getProductIndex($productId);

        if ($index !== false) {
            cart()->removeAt($index);
        }
    }

    /**
     * Update user input quantity.
     *
     * @param $productId
     * @param $quantity
     */
    public static function setCartItemQuantity($productId, $quantity)
    {
        $index = self::getProductIndex($productId);

        if ($index === false) {
            // If index was not found - we add the product into the cart
            self::addToCart($productId, $quantity);
        } else {
            // If we have index - we update that cart item
            cart()->setQuantityAt($index, $quantity);
        }
    }

    /**
     * Gets Products Index from Cart
     *
     * @param $productId
     * @return false|int|string
     */
    public static function getProductIndex($productId)
    {
        $cart = self::getCart();

        if ($items = $cart->items) {
            // Find the product exists in the items array
            $exists = Arr::where($items, function ($item) use ($productId) {
                return $item['modelId'] === $productId;
            });

            // If exists - return the first key
            if ($exists) {
                return array_key_first($exists);
            }
        }

        return false;
    }

    /**
     * Verify Cart has any Products.
     *
     * @param $productId
     * @return bool
     */
    public static function hasProduct($productId)
    {
        return self::getProductIndex($productId) !== false;
    }

    /**
     * Get the Product using Product Id.
     *
     * @param $productId
     * @return false|mixed
     */
    public static function getProduct($productId)
    {
        $product = false;

        $index = self::getProductIndex($productId);

        if ($index !== false) {
            $product = self::getCart()->items[$index];
        }

        return $product;
    }

    /**
     * Get the Product Quantity using Product Id.
     *
     * @param $productId
     * @return int|mixed
     */
    public static function getProductQuantity($productId)
    {
        $quantity = 0;

        $product = self::getProduct($productId);

        if ($product !== false) {
            $quantity = $product['quantity'];
        }

        return $quantity;
    }

    /**
     * Clear Cart.
     *
     * @return mixed
     */
    public static function clearCart()
    {
        return cart()->clear();
    }
}
