<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
}
