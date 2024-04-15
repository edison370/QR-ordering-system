<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\DateFormat;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = [
        'code',
        'description',
        'isActive',
    ];

    public function orders(){
        return $this->hasMany(Order::class, "tableID", "id");
    }

    protected $casts = [
        'created_at' => DateFormat::class,
        'updated_at' => DateFormat::class,
    ];

}
