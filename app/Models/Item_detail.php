<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_detail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'item_details';

    protected $fillable = [
        'itemID',
        'name',
        'value',
        'type',
        'reference',
        'description',
    ];

}
