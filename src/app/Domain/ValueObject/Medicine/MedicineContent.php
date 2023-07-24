<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class MedicineContent
{
    private string $content;

    public function __construct(string $content)
    {
        if (!is_string($content)) {
            throw ValidationException::withMessages(["message" => "薬の内容は文字列じゃないといけません"]);
        }

        if (!$content) {
            throw ValidationException::withMessages(["message" => "薬の内容は必須です"]);
        }

        $this->content = $content;
    }

    public function getMedicineContent()
    {
        return $this->content;
    }
}
