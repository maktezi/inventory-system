<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Inventory;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $totalUser = User::count();
        $totalBrand = Brand::count();
        $totalItem = Item::count();
        $totalSupplier = Supplier::count();
        $totalInventory = Inventory::count();
        return view('admin.dashboard',compact('totalUser', 'totalBrand', 'totalSupplier', 'totalInventory', 'totalItem'));
    }

}
