<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'shop_id', 'qts'];
    public function product()
    {
        $this->hasOne(Product::class, 'product_id');
    }
}
