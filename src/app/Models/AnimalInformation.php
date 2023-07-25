<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalInformation extends Model
{
    use HasFactory;
    protected $table = 'animal_informations';

    public function medicineHistories()
    {
        return $this->hasMany(MedicineHistory::class);
    }
}
