<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockController extends Controller
{

    public function stock()
    {
        $stocks = Stock::all();
        return view('admin.stock.stock',compact('stocks'));
    }

    public function add(){
        $brands = Brand::all()->sortBy('name');
        $items = Item::all()->sortBy('name');
        $suppliers = Supplier::all()->sortBy('name');
        return view('admin.stock.add',compact('brands','items','suppliers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $supplier = Supplier::where('id', $request->supplier_id);
        $brand = Brand::where('id', $request->brand_id);
        $item = Item::where('id', $request->item_id);

        if ($supplier && $brand && $item) {
            Stock::create([
                'supplier_id' => $request->supplier_id,
                'brand_id' => $request->brand_id,
                'item_id' => $request->item_id,
                'serial_key' => $request->serial_key,
        ]);

        Alert::success('Stock Added');
        return redirect('/stocks');
        // return redirect()->back();
        } else {
            Alert::warning('Something went wrong, Please try again.');
            return redirect()->back();
        }
    }

    public function release($id)
    {
        $stock = Stock::find($id);
        if ($stock) {
            Alert::question('Release Stock?');
            return redirect()->back();
        } else {
            Stock::find($id)->delete();
            Alert::success('Stock Released.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Stock::find($id)->delete();
        Alert::success('Stock Deleted!');
        return redirect()->back();
    }
}
