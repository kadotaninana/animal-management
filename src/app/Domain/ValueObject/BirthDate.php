<?php

namespace App\Domain\ValueObject;

class BirthDate
{
    private $birthDate;
    public function __construct(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function age()
    {
        //年齢を自動出力
        $today = date('Ymd');
        $birthday = str_replace("-", "", $this->birthDate);
        return floor(($today - $birthday) / 10000);
    }
}
