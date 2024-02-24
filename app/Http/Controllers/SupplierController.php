<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function supplier()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.supplier',compact('suppliers'));
    }

    public function add(){
        return view('admin.supplier.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            Supplier::create([
                'name'=> $request->name,
                'contact'=> $request->contact,
                'email'=> $request->email,
                'address'=> $request->address,
            ]);

            Alert::success('Supplier Added');
            // return redirect('/suppliers');
            return redirect()->back();

            } catch(\Exception $e){
            Alert::warning('Duplicate entry detected. Please enter a unique value.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('admin.supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Supplier::find($id);
            $data->name = $request->input('name');
            $data->contact = $request->input('contact');
            $data->email = $request->input('email');
            $data->address = $request->input('address');
            $data->save();

            Alert::success('Supplier Updated!');
            return redirect('/suppliers');

            } catch(\Exception $e){
            Alert::warning('Duplicate entry detected. Please enter a unique value.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Supplier::find($id)->delete();
        Alert::toast('Supplier Deleted!');
        return redirect()->back();
    }

}
