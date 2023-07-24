<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineHowOften
{
    private int $howOften;

    public function __construct(int $howOften)
    {
        if (!is_int($howOften)) {
            throw ValidationException::withMessages(["message" => "服用回数は数字でないといけません"]);
        }

        $this->howOften = $howOften;
    }

    public function getHowOften()
    {
        return $this->howOften;
    }
}
