<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineName
{
    private string $medicineName;

    public function __construct(string $medicineName)
    {
        if (!$medicineName) {
            throw ValidationException::withMessages(["message" => "薬名は必須です"]);
        }

        if (!is_string($medicineName)) {
            throw ValidationException::withMessages(["message" => "薬名は文字列じゃないといけません"]);
        }

        $this->medicineName = $medicineName;
    }

    public function getMedicineName()
    {
        return $this->medicineName;
    }
}
