<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'email',
        'address',
    ];

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
