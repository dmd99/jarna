<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'isOwner',
        'country',
        'city',
        'postal_code',
        'address_line1',
        'address_line2',
    ];
    /* Voyager relationship data connexion
    public function userAddressId()
    {
    	return $this->belongsTo(User::class);
    }
    /* Api relationship data connexion 
    public function userAddress()
    {
    	return $this->belongsTo(User::class);
    } */
}
