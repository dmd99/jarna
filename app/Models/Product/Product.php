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
        'product_categories_id',
        'price',
        'discount_price',
        'unit_id',
        'measurement_id',
        'status',
        'shop_id',
        'product_views',
        'is_featured',
    ];
    public function productDetails()
    {
        return $this->hasOne(ProductDetails::class);
    }
    public function taxes()
    {
        return $this->belongsTo(Tax::class, 'tax_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id');
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
