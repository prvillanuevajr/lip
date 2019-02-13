<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Lipstick;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function list()
    {
        return $cart = auth()->user()->cart()->with('lipstick.brand', 'lipstick.finish')->get();
    }

    public function store(Request $request)
    {
        $lipstick = Lipstick::find($request->lipstick);
        $Noitem = auth()->user()->cart()->where('lipstick_id', $lipstick->id)->get()->isEmpty();
        if ($Noitem) {
            auth()->user()->cart()->create([
                'lipstick_id' => $lipstick->id,
                'quantity' => 1,
            ]);
        } else {
            $cart = auth()->user()->cart()->where('lipstick_id', $lipstick->id)->first();
            $cart->quantity++;
            $cart->save();
        }
        return redirect('/cart');
    }

    public function update(Request $request)
    {
        foreach ($request->items as $item) {
            if ($item['quantity'] == 0) {
                Cart::find($item['id'])->forceDelete();
            } else {
                $cartItem = Cart::find($item['id']);
                $cartItem->quantity = $item['quantity'];
                $cartItem->save();
            }
        }
    }

    public function delete(Request $request)
    {
        Cart::find($request->id)->forceDelete();
    }
}
