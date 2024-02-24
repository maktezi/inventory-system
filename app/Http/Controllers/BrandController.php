<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function brand()
    {
        $brands = Brand::all();
        return view('admin.brand.brand',compact('brands'));
    }

    public function add(){
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            Brand::create([
                'name'=> $request->name,
            ]);

            Alert::success('Brand Added');
            // return redirect('/brands');
            return redirect()->back();

            } catch(\Exception $e){
            Alert::warning('Duplicate entry detected. Please enter a unique value.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Brand::find($id);
        return view('admin.brand.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Brand::find($id);
            $data->name = $request->input('name');
            $data->save();

            Alert::success('Brand Updated!');
            return redirect('/brands');

        } catch(\Exception $e){
        Alert::warning('Duplicate entry detected. Please enter a unique value.');
        return redirect()->back();
        }
    }

    public function delete($id)
    {
        Brand::find($id)->delete();
        Alert::toast('Brand Deleted!');
        return redirect()->back();
    }
}
