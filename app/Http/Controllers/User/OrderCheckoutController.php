<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class OrderCheckoutController extends Controller
{
    public function index()
    {
        return view('users.dashboard.orders.index');
    }
    public function ShowMyOrders()
    {
        $cartItems = Cart::getContent();
        return view('users.dashboard.orders.show', compact('cartItems'));

    }
}

