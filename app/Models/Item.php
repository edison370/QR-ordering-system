<?php

namespace App\Models;

use App\Casts\AmountNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\DateFormat;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'description',
        'imagePath',
        'categoryID',
        'price',
    ];

    protected $casts = [
        'price' => AmountNumber::class,
        'created_at' => DateFormat::class,
        'updated_at' => DateFormat::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function item_details(){
        return $this->hasOne(Item_detail::class, "itemID", "id");
    }
}
