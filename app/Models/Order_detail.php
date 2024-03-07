<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'order_details';

    protected $fillable = [
        'orderID',
        'itemID',
        'quantity',
        'comment',
        'amount',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function item(){
        return $this->hasOne(Item::class, "id", "itemID");
    }
}
