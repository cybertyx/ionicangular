<?php

namespace DeliveryQuick\Models;

use Illuminate\Database\Eloquent\Model;
use DeliveryQuick\User;
use DeliveryQuick\Models\OrderItem;
use DeliveryQuick\Models\Client;
use DeliveryQuick\Models\Cupom;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'user_deliveryman_id',
        'total',
        'status',
    ];
    
    public function client() {
        return $this->belongsTo(Client::class);
    }
    
    public function cupom() {
        return $this->belongsTo(Cupom::class);
    }
    
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
    
    public function deliveryman() {
        return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
    }
    
    public function products() {
        return $this->hasMany(OrderItem::class);
    }
}
