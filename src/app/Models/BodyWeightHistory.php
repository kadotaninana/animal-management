<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyWeightHistory extends HistoryModel
{
    use HasFactory;
    protected $table = 'body_weight_histories';

    protected $fillable = [
        'body_weight',
        'unit',
        'latest_flag',
        'timestamp',
        'start_at',
        'version',

    ];
}
