<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineQuantity
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        if (!is_int($quantity)) {
            throw ValidationException::withMessages(["message" => "数量は数字でないといけません"]);
        }
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
