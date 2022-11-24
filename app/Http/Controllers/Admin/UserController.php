<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Console\View\Components\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_as', '0')->get();
        return view('admin.users.index', compact('users'));
    }
    
    public function edit($id)
    {
        $user_data = User::find($id);

        
        return view('admin.users.edit', compact('user_data'));
    }
    
    public function update(Request $request, $id)
    {
        $user_data = User::find($id);
        $user_data->name = $request->input('name');
        $user_data->email = $request->input('email');
        $user_data->phone = $request->input('phone');
        $user_data->address = $request->input('address');
        $user_data->city = $request->input('city');
        $user_data->country = $request->input('country');
        $user_data->postalcode = $request->input('postalcode');
        $user_data->update();
        return redirect('users')->with('status', "User Data Successfully Updated");
    }

    public function destroy($id)
    {
        $user_data = User::find($id);
        $user_cart_data = Cart::where('user_id', $user_data->id)->get();
        $user_order_data = Order::where('user_id', $user_data->id)->get();
        $user_order_id = Order::where('user_id', $user_data->id)->get('id');
        $user_order_items_data = OrderItem::whereIn('order_id', $user_order_id)->get();

        OrderItem::destroy($user_order_items_data);
        Order::destroy($user_order_data);
        Cart::destroy($user_cart_data);
        $user_data->delete();
        return redirect('users')->with('status', "User Deleted");
    }
}
