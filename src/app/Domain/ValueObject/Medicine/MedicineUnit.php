<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineUnit
{
    private string $unit;

    public function __construct(string $unit)
    {
        if (!$unit) {
            throw ValidationException::withMessages(["message" => "単位は必須です"]);
        }

        if (!is_string($unit)) {
            throw ValidationException::withMessages(["message" => "単位は文字列じゃないといけません"]);
        }

        $this->unit = $unit;
    }

    public function getUnit()
    {
        return $this->unit;
    }
}
