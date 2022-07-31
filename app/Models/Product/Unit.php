<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable =['name','value'];
    public function products()
    {
        $this->hasMany(Product::class, 'product_id');
    }
}
