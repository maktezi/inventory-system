<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    public function brand()
    {
        $items = Item::all();
        return view('admin.item.item',compact('items'));
    }

    public function add(){
        return view('admin.item.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            Item::create([
                'name'=> $request->name,
            ]);

            Alert::success('Item Added');
            // return redirect('/items');
            return redirect()->back();

            } catch(\Exception $e){
            Alert::warning('Duplicate entry detected. Please enter a unique value.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Item::find($id);
        return view('admin.item.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Item::find($id);
            $data->name = $request->input('name');
            $data->save();

            Alert::success('Item Updated!');
            return redirect('/items');

        } catch(\Exception $e){
        Alert::warning('Duplicate entry detected. Please enter a unique value.');
        return redirect()->back();
        }
    }

    public function delete($id)
    {
        Item::find($id)->delete();
        Alert::toast('Item Deleted!');
        return redirect()->back();
    }
}
