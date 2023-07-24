<?php

namespace App\Domain\ValueObject\Medicine;

use Illuminate\Validation\ValidationException;

class UseStartDate
{
    private string $startDate;

    public function __construct(string $startDate)
    {
        // 日付かどうか判定
        if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $startDate)) {
            throw ValidationException::withMessages(["message" => "薬使用開始の日付のフォーマットが正しくありません"]);
        }

        $this->startDate = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }
}
