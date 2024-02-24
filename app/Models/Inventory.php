<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'brand_id',
        'item_id',
        'stocks',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

}
