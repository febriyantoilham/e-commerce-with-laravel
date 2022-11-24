<?php

namespace App\Http\Controllers\Store;

use App\Models\Order;
use App\Models\Catalogue;
use App\Models\OrderItem;
use Illuminate\Support\Arr;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $active_type = ProductTypes::where('status','1')->get('title');
        $all_catalogue = Catalogue::whereIn('product_type', $active_type)->get();

        $popular_product_type = ProductTypes::where('status','1')->where('popular', '1')->get('title');
        $popular_catalogue = Catalogue::whereIn('product_type', $popular_product_type)->take(15)->get();

        return view('store.index', compact('popular_catalogue', 'all_catalogue'));
    }

    public function product_view($id)
    {
        if (Catalogue::where('id', $id)->exists()) {
            $product =  Catalogue::where('id', $id)->first();
            return view('store.product.view', compact('product'));
        } else {
            return redirect('/')->with('status', 'The product was not found');
        }
    }

    public function index_catalog()
    {
        $active_type = ProductTypes::where('status','1')->get('title');
        $catalogs = Catalogue::whereIn('product_type', $active_type)->get();

        return view('store.product.catalog', compact('catalogs'));
    }

    public function orderList()
    {
        $order_list = Order::where('user_id', Auth::id())->get();
        return view('store.orders.index', compact('order_list'));
    }

    public function order_details($id)
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

        return view('store.orders.order_details', compact('order_item', 'order_details', 'total_qty', 'total_amount'));
    }
}
