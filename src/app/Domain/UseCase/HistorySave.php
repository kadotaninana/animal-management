<?php

namespace App\Domain\UseCase;

use App\Models\HistoryModel;
use Carbon\Carbon;

class HistorySave
{
    /**
     * 履歴保存
     * @param array|null $request
     * @param int $animalInformationId
     * @param HistoryModel $historyModel
     */
    public function save($request, $animalInformationId, $historyModel)
    {
        if (is_null($request)) return;

        $alreadyHistory = (clone $historyModel)->where('latest_flag', '=', true)
            ->where('animal_information_id', '=', $animalInformationId)
            ->orderBy('version', 'DESC')
            ->first();

        (clone $historyModel)
            ->where('latest_flag', '=', true)
            ->update(['latest_flag' => false]);

        if (array_key_exists(0, $request)) {
            $hiistoryParams = [];
            foreach ($request as $historyParam) {
                $hiistoryParams[] = array_merge(
                    $historyParam,
                    [
                        'animal_information_id' => $animalInformationId,
                        'latest_flag' => true,
                        'version' => $alreadyHistory ? $alreadyHistory->version + 1 : 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ],
                );
            }
            $historyModel::insert($hiistoryParams);
        } else {
            $historyModel->fill($request);
            $historyModel->animal_information_id = $animalInformationId;
            $historyModel->latest_flag = true;
            $historyModel->version = $alreadyHistory ? $alreadyHistory->version + 1 : 1;
            $historyModel->save();
        }
    }
}
