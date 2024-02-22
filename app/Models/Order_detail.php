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
        'name',
        'value',
        'type',
        'reference',
        'description',
    ];
}
