<?php
namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private CartRepository     $carts,
        private CartItemRepository $cartItems,
    ) {}

    public function checkout()
    {
        $user = auth()->user();
        $cart = $this->carts->findByUserId($user->id);
        $cartItems = $this->cartItems->findByCartId($cart->id);

        return view('checkout', compact('user', 'cartItems'));
    }
}
