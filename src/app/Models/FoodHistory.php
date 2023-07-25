<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodHistory extends HistoryModel
{
    use HasFactory;
    protected $table = 'food_histories';

    protected $fillable = [
        'food_name',
        'food_quantity',
        'unit',
        'latest_flag',
        'timestamp',
        'start_at',
        'version',
    ];
}
