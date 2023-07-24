<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineHistory extends HistoryModel
{
    use HasFactory;
    protected $table = 'medicine_histories';

    protected $fillable = [
        'animal_infomation_id',
        'medicine_name',
        'how_often',
        'medicine_quantity',
        'uni',
        'memo',
        'latest_flag',
        'start_at',
        'version',
    ];
}
