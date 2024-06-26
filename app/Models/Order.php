<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\DateFormat;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'tableID',
        'amount',
        'status',
    ];

    public function order_details(){
        return $this->hasMany(Order_detail::class, "orderID", "id");
    }

    public function table(){
        return $this->belongsTo(Table::class,"tableID","id");
    }
    
    protected $casts = [
        'created_at' => DateFormat::class,
        'updated_at' => DateFormat::class,
    ];

}
