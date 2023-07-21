<?php

namespace App\Domain\ValueObject\MedicineHistory;

class UseStartDate
{
    public function __construct(string $startDate)
    {
        // 日付かどうか判定
        if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $startDate)) {
            throw new \Exception("薬使用開始の日付のフォーマットが正しくありません");
        }
    }
}
