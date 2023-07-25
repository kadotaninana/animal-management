<?php

namespace App\Domain\UseCase;

use App\Domain\ValueObject\BirthDate;
use App\Models\AnimalInformation;

class AnimalInformationSave
{
    /**
     * 動物情報保存
     * 
     * @return int
     */
    public function save($params)
    {
        //年齢を自動出力
        $birthDate = new BirthDate($params['birthday']);
        $age = $birthDate->age();

        //データベースに動物基本情報を登録
        $animalInformation = new AnimalInformation();
        $animalInformation->animal_name = $params['animal_name'];
        $animalInformation->birthday = $params['birthday'];
        $animalInformation->age = $age;
        $animalInformation->came = $params['came'];
        $animalInformation->user_id = "1";
        $animalInformation->save();

        return $animalInformation->id;
    }
}
