<?php

namespace App\Domain\ValueObject\Medicine;

class MedicineList
{
    private function __construct()
    {
    }

    public static function create(array $medicineListParam)
    {
        $medicineList = [];
        foreach ($medicineListParam as $medicineParam) {
            $medicine = new Medicine(
                $medicineParam['medicine_name'],
                $medicineParam['memo'],
                $medicineParam['medicine_quantity'],
                $medicineParam['unit'],
                $medicineParam['when'],
                $medicineParam['how_often'],
                $medicineParam['start_at']
            );
            $medicineList[] = $medicine->toArray();
        }
        return $medicineList;
    }
}
