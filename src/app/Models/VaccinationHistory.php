<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationHistory extends HistoryModel
{
    use HasFactory;
    protected $table = 'vaccination_histories';

    protected $fillable = [
        'vaccination_name',
        'memo',
        'latest_flag',
        'timestamp',
        'start_at',
        'version',
    ];
}
