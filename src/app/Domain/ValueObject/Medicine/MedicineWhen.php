<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineWhen
{
    private string $when;

    public function __construct(string $when)
    {
        if (!is_string($when)) {
            throw ValidationException::withMessages(["message" => "服用タイミングは文字列じゃないといけません"]);
        }

        if (!$when) {
            throw ValidationException::withMessages(["message" => "服用タイミングは必須です"]);
        }

        $this->when = $when;
    }

    public function getMedicineWhen()
    {
        return $this->when;
    }
}
