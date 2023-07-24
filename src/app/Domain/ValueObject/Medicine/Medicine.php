<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class Medicine
{
    private MedicineName $name;
    private MedicineContent $content;
    private MedicineQuantity $quantity;
    private MedicineUnit $unit;
    private MedicineWhen $when;
    private MedicineHowOften $howOften;
    private UseStartDate $useStartDate;

    public function __construct(
        string $name,
        string $content,
        int $quantity,
        string $unit,
        string $when,
        int $howOften,
        string $useStartDate
    ) {
        $this->name = new MedicineName($name);
        $this->content = new MedicineContent($content);
        $this->quantity = new MedicineQuantity($quantity);
        $this->unit = new MedicineUnit($unit);
        $this->when = new MedicineWhen($when);
        $this->howOften = new MedicineHowOften($howOften);
        $this->useStartDate = new UseStartDate($useStartDate);
    }

    function toArray()
    {
        return [
            'medicine_name' => $this->name->getMedicineName(),
            'memo' => $this->content->getMedicineContent(),
            'how_often' => $this->howOften->getHowOften(),
            'when' => $this->when->getMedicineWhen(),
            'medicine_quantity' => $this->quantity->getQuantity(),
            'unit' => $this->unit->getUnit(),
            'start_at' => $this->useStartDate->getStartDate(),
        ];
    }
}
