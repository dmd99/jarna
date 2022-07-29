<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }


    public function children()
    {
        return $this->hasOne(Category::class, 'parent_id');
    }

}
