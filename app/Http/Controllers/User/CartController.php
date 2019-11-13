<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Product;
use Cart;
class CartController extends Controller
{
    public function store(Request $request) {
        $same = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });
        if($same->isNotEmpty()) {
            session()->flash('status','Item is alreay in the cart!');
            return redirect()->route('details',$request->product_id);
        }else{
        Cart::add($request->product_id, $request->product_name,$request->qty,$request->product_price)->associate('App\Product');
        session()->flash('status', 'Item has been added');
        return redirect()->route('details',$request->product_id);
        }
    }

    public function index() {
        return view('userview.cart');
    }

    public function empty() {
        Cart::destroy();
    }

    public function remove($id) {
        $new = Cart::search(function ($cartItem, $rowId) use($id) {
            return $cartItem->rowId === $id;
        });
        if($new->count() > 0) {
       $cool = $new->first()->name;
       $coo = $cool. ' has been removed from cart!';
       Cart::remove($id);
       return redirect()->back()->with('status',$coo);
        }
    }

    public function update(Request $request) {
        $id = $request->get('id');
        $value= $request->get('value');
        Cart::update($id,['qty' => $value]);
        return response()->json(['success' => 'true']);
    }
}
