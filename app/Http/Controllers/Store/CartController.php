<?php

namespace App\Http\Controllers\Store;

use App\Models\Cart;
use App\Models\User;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('qty');

        if (Auth::check()) {
            $product_check = Catalogue::where('id', $product_id)->first();
            if ($product_check) {
                if ($qty >= 1) {
                    if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                        return response()->json(['status' => $product_check->name."Already on cart"]);
                    } else {
                        $cartItem = new Cart();
                        $cartItem->user_id = Auth::id();
                        $cartItem->product_id = $product_id;
                        $cartItem->qty = $qty;
                        $cartItem->save();
        
                        return response()->json(['status' => $product_check->name." Added"]);
                    }
                } else {
                    return response()->json(['status' => "Please Add Quantity of Product"]);
                }
            }
        } else {
            return response()->json(['status' => "Please Login or Register to Continue"]);
        }
    }

    public function getCart()
    {
        $cartItem = Cart::where('user_id', Auth::id())->get();
        $a = json_decode($cartItem);
        return view('store.cart.index', compact('cartItem', 'a'));
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $qty = $request->input('qty');

        if (Auth::check()) {
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->qty = $qty;
                $cartItem->update();
                return response()->json(['status'=>'Quantity Updated']);
            }
        }
    }

    public function deleteCartItem(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Product Deleted From Your Cart']);
            }
        } else {
            return response()->json(['status' => 'Please Login or Register to Continue']);
        };
    }

    public function updateUser(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->postalcode = $request->input('postalcode');
        $user->update();
        return redirect('cart')->with('status', "Data Successfully Updated");
    }
}
