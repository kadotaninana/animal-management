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

    public function bodyWeightHistory()
    {
        return $this->hasMany(bodyWeightHistory::class);
    }

    public function foodHistories()
    {
        return $this->hasMany(foodHistory::class);
    }

    public function outpatientHistories()
    {
        return $this->hasMany(outpatientHistory::class);
    }

    public function vaccinationHistories()
    {
        return $this->hasMany(vaccinationHistory::class);
    }
}
