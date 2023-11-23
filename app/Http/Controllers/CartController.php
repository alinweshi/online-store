<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartList()
    {
        $cartItems = Cart::getContent();
        // dd($cartItems);
        return view('users.dashboard.cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $product->image,
            ),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'quantity' => 'required|numeric|min:1', // Ensure quantity is numeric and at least 1
        ]);

        $cartItem = Cart::getContent()->where('id', $id)->first();

        if (!$cartItem) {
            return redirect()->route('cart.list')->with('error1', 'Cart item not found!');
        }

        $newQuantity = $request->quantity;

        // Add the item back to the cart with the updated quantity
        $cart = Cart::update($id, array('quantity' => array(
            'relative' => false,
            'value' => $request->quantity,
        )));

        if ($cart) {
            session()->flash('success', 'Cart updated successfully!');
            return redirect()->route('cart.list');
        } else {
            session()->flash('error', 'Cart did not update successfully!');
            return redirect()->route('cart.list');
        }
    }

    public function removeCart(product $product)
    {
        Cart::remove($product->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
