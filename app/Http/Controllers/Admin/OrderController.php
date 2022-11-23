<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as File;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order_item = Order::find($id);
        $order_details = OrderItem::where('order_id', $order_item->id)->get();

        $total_qty = 0;
        foreach ($order_details as $item) {
            $total_qty += $item->qty;
        }

        $total_amount = 0;
        foreach ($order_details as $item) {
            $total_amount += $item->qty * $item->price;
        }

        return view('admin.orders.edit', compact('order_item', 'order_details', 'total_qty', 'total_amount'));
    }

    public function update(Request $request, $id)
    {
        $order_item = Order::find($id);
        if ($request->hasFile('payment_reference')) {
            $path = 'assets/uploads/payments/'.$order_item->payment_reference;
            if (File::exists($path)) {
                File::delete($path);
            };
            $file = $request->file('payment_reference');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/payments/', $filename);
            $order_item->payment_reference = $filename;
        };

        $order_item->name = $request->input('name');
        $order_item->email = $request->input('email');
        $order_item->phone = $request->input('phone');
        $order_item->address = $request->input('address');
        $order_item->city = $request->input('city');
        $order_item->country = $request->input('country');
        $order_item->postalcode = $request->input('postalcode');
        $order_item->payment_method = $request->input('payment_method');
        $order_item->payment_status = $request->input('payment_status');
        $order_item->status = $request->input('status');
        $order_item->message = $request->input('message');
        $order_item->update();
        return redirect('edit_order/'.$id)->with('status', "Order Successfully Updated");
    }

    public function destroy($id)
    {
        $order_item = Order::find($id);
        $order_id = $order_item->id;
        $order_item_details = OrderItem::where('order_id', $order_id)->get();
        $order_item->delete();
        OrderItem::destroy($order_item_details);
        return redirect('orders')->with('status', "Order Deleted");
    }

    public function destroy_item($id)
    {
        $order_item = OrderItem::find($id);
        $order_id = $order_item->order_id;
        $order_item->delete();
        return redirect('edit_order/'.$order_id)->with('status', "Order Successfully Updated");
    }
}
