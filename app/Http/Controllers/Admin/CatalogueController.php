<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogue = Catalogue::all();
        return view('admin.catalogue.index', compact('catalogue'));
    }

    public function add()
    {
        $product_types = ProductTypes::all();
        return view('admin.catalogue.add', compact('product_types'));
    }

    public function create(Request $request)
    {
        $catalogue_item = new Catalogue();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $catalogue_item->img = $filename;
        };

        $catalogue_item->name = $request->input('name');
        $catalogue_item->description = $request->input('description');
        $catalogue_item->price = $request->input('price');
        $catalogue_item->stars = $request->input('stars');
        $catalogue_item->product_type = $request->input('product_type');
        $catalogue_item->save();
        return redirect('catalogue')->with('status', "Product Successfully Added");
    }

    public function edit($id)
    {
        $product_types = ProductTypes::all();
        $catalogue_item = Catalogue::find($id);
        return view('admin.catalogue.edit', compact('catalogue_item', 'product_types'));
    }

    public function update(Request $request, $id)
    {
        $catalogue_item = Catalogue::find($id);
        if ($request->hasFile('img')) {
            $path = 'assets/uploads/products/'.$catalogue_item->img;
            if (File::exists($path)) {
                File::delete($path);
            };
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $catalogue_item->img = $filename;
        };

        $catalogue_item->name = $request->input('name');
        $catalogue_item->description = $request->input('description');
        $catalogue_item->price = $request->input('price');
        $catalogue_item->stars = $request->input('stars');
        $catalogue_item->product_type = $request->input('product_type');
        $catalogue_item->update();
        return redirect('catalogue')->with('status', "Product Successfully Updated");
    }

    public function destroy($id)
    {
        $catalogue_item = Catalogue::find($id);
        $catalogue_item->delete();
        return redirect('catalogue')->with('status', "Product Deleted");
    }
}
