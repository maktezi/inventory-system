<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
