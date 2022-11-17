<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductTypes;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{
    public function index()
    {
        $product_types = ProductTypes::all();
        return view('admin.product-types.index', compact('product_types'));
    }

    public function add()
    {
        return view('admin.product-types.add');
    }

    public function create(Request $request)
    {
        $product_type = new ProductTypes();

        $product_type->title = $request->input('title');
        $product_type->slug = $request->input('slug');
        $product_type->description = $request->input('description');
        $product_type->status = $request->input('status') == TRUE ? '1' : '0';
        $product_type->popular = $request->input('popular') == TRUE ? '1' : '0';
        $product_type->save();
        return redirect('product_types')->with('status', "Product Type Successfully Added");
    }

    public function edit($id)
    {
        $product_type = ProductTypes::find($id);
        return view('admin.product-types.edit', compact('product_type'));
    }

    public function update(Request $request, $id)
    {
        $product_type = ProductTypes::find($id);

        $product_type->title = $request->input('title');
        $product_type->slug = $request->input('slug');
        $product_type->description = $request->input('description');
        $product_type->status = $request->input('status') == TRUE ? '1' : '0';
        $product_type->popular = $request->input('popular') == TRUE ? '1' : '0';
        $product_type->update();
        return redirect('product_types')->with('status', "Product Type Successfully Updated");
    }

    public function destroy($id)
    {
        $product_type = ProductTypes::find($id);
        $product_type->delete();
        return redirect('product_types')->with('status', "Product Type Deleted");
    }
}
