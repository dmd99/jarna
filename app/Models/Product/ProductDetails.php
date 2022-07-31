<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','name', 'description', 'product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
