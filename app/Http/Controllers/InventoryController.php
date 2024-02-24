<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\Stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    // public function inventory()
    // {
    //     $inventories = Inventory::with('brand', 'item', 'supplier')->get();
    //     return view('admin.inventory.inventory', compact('inventories'));
    // }

    public function inventory()
    {
        $inventories = Inventory::all();
        return view('admin.inventory.inventory',compact('inventories'));
    }

    public function add(){
        $brands = Brand::all()->sortBy('name');
        $items = Item::all()->sortBy('name');
        $suppliers = Supplier::all()->sortBy('name');
        return view('admin.inventory.add',compact('brands','items','suppliers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $supplier = Supplier::where('id', $request->supplier_id);
        $brand = Brand::where('id', $request->brand_id);
        $item = Item::where('id', $request->item_id);

        if ($supplier && $brand && $item) {
            Inventory::create([
                'supplier_id' => $request->supplier_id,
                'brand_id' => $request->brand_id,
                'item_id' => $request->item_id,
                'stocks' => $request->stocks,
        ]);

        Alert::success('Inventory Added');
        // return redirect('/inventories');
        return redirect()->back();
        } else {
            Alert::warning('Something went wrong, Please try again.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Inventory::find($id);
        $brands = Brand::all()->sortBy('name');
        $items = Item::all()->sortBy('name');
        $suppliers = Supplier::all()->sortBy('name');
        return view('admin.inventory.edit', compact('data','brands','items','suppliers'));
    }

    public function update(Request $request, $id)
    {
        $data = Inventory::find($id);
        $supplier = Supplier::find($request->input('supplier_id'));
        $brand = Brand::find($request->input('brand_id'));
        $item = Item::find($request->input('item_id'));

        if ($supplier && $brand && $item) {
            $duplicateCheck = Inventory::where('supplier_id', $request->input('supplier_id'))
                ->where('brand_id', $request->input('brand_id'))
                ->where('item_id', $request->input('item_id'))
                ->where('id', '!=', $id)
                ->first();

            if (!$duplicateCheck) {
                $data->supplier_id = $request->input('supplier_id');
                $data->brand_id = $request->input('brand_id');
                $data->item_id = $request->input('item_id');
                $data->stocks = $request->input('stocks');

                $data->save();
                Alert::success('Inventory Updated!');
                return redirect('/inventories');

            } else {
                Alert::warning('Duplicate entry detected. Please enter a unique value.');
                return redirect()->back();
            }
        } else {
            Alert::warning('Invalid data provided.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Inventory::find($id)->delete();
        Alert::success('Inventory Deleted!');
        return redirect()->back();
    }

    public function releaseStock(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'release_value' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inventory = Inventory::findOrFail($id);

        if ($inventory->stocks >= $request->input('release_value')) {
            $inventory->decrement('stocks', $request->input('release_value'));

            Alert::success('Stock released.');
            return redirect()->back();
        } else {
            Alert::error('Insufficient stock.');
            return redirect()->back();
        }
    }

    public function addStock(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'add_value' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inventory = Inventory::findOrFail($id);
        $inventory->increment('stocks', $request->input('add_value'));

        Alert::success('Stock added successfully.');
        return redirect()->back();
    }

    private function generateRandomSerialNumber()
    {
        $serialNumber = mt_rand(100000, 999999);
        return $serialNumber;
    }

}
