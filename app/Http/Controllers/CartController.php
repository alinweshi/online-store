<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'size' => $product->size,
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

    public function checkoutStore()
    {

        // Fetch the cart items
        $cartItems = Cart::getContent();

        // Get the authenticated user
        $user = Auth::user();
        // foreach ($cartItems as $row) {
        //     return $row->quantity;
        // }

        // Pass the cart items and user details to the view
        return view('users.dashboard.orders.index', get_defined_vars());
    }

    public function PlaceOrderPost(PlaceOrderRequest $request)
    {
        // dd($request->all());
        // Validate the incoming request

        // Create a new Order instance
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_city' => $request->country_city,
            'address' => $request->address,
            'country' => $request->country,
            'square' => $request->square,
            'status' => "0",
            "payment_method" => "1",
            "payment_status" => "0",
            "payment_id" => "0",

            // Additional fields you might need to set
        ]);

        // Check if the order was created successfully
        if ($order) {
            // If successful, flash a success message
            session()->flash('success', 'Order created successfully');
        } else {
            // If not successful, flash an error message
            session()->flash('error', 'Order did not be created successfully');
        }

        // Redirect to the checkout page (adjust the route as needed)
        return redirect()->route('checkout.store', get_defined_vars());

    }

}
