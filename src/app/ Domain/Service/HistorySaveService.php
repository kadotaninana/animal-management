<?php

namespace App\Domain\Service;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use App\Models\BodyWeightHistory;
use App\Models\HistoryModel;
use Carbon\Carbon;

class HistorySaveService
{
    /**
     * 履歴保存
     */
    public function save($request, $animalInformationId, HistoryModel $historyModel)
    {
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
