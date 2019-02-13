<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use function foo\func;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $transactions = Transaction::all();
        } else {
            $transactions = auth()->user()->transactions;
        }
//        return $transactions;
        return view('transaction.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        $sub_total = $transaction->details->map(function ($item) {
            return ($item->quantity * $item->price);
        })->sum();
        return view('transaction.show', compact('transaction', 'sub_total'));
    }

    public function store(Request $request)
    {
        $cart = auth()->user()->cart()->with('lipstick.brand', 'lipstick.finish')->get();
        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->total_price = $cart->map(function ($item) {
            return $item->quantity * $item->lipstick->price;
        })->sum();
        $transaction->save();
        foreach ($cart as $item) {
            $transaction->details()->create([
                'lipstick_id' => $item->lipstick->id,
                'quantity' => $item->quantity,
                'price' => $item->lipstick->price,
            ]);
            Cart::find($item->id)->forceDelete();
        };

        return $transaction->id;
    }
}
