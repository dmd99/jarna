<?php

namespace App\Models\Product;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_type',
        'slug',
        'sku',
        'product_image',
        'product_details_id',
        'gallery_id',
        'price',
        'discount_price',
        'unit_id',
        'measurement_id',
        'unpublished',
        'shop_id',
        'tax_id',
        'inventory_id',
        'product_views',
        'is_featured',
    ];
    public function productDetails()
    {
        return $this->hasOne(ProductDetails::class);
    }
    
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
