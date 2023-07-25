<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutpatientHistory extends HistoryModel
{
    use HasFactory;
    protected $table = 'outpatient_histories';

    protected $fillable = [
        'hospital_name',
        'memo',
        'latest_flag',
        'timestamp',
        'start_at',
        'version',
    ];
}
