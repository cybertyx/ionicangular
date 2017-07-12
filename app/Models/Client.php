<?php

namespace DeliveryQuick\Models;

use Illuminate\Database\Eloquent\Model;
use DeliveryQuick\User;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zipcode',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}
