<?php

namespace App\Http\Controllers;

use App\Models\AnimalInformation;
use App\Models\BodyWeightHistory;
use App\Models\FoodHistory;
use App\Models\MedicineHistory;
use App\Models\OutpatientHistory;
use Illuminate\Http\Request;

class HistoryFetchController extends Controller
{
    /**
     * 薬履歴の取得
     */
    public function fetchMedicineHistory($animalInformationId)
    {
        // 薬履歴テーブルからデータを取得
        $medicineHistories = MedicineHistory::where('animal_information_id', $animalInformationId)->orderBy('version', 'DESC')->cursorPaginate(10);
        return response()->json(["medicine_histories" => $medicineHistories]);
    }

    /**
     * 通院履歴の取得
     */
    public function fetchOutpatientHistory($animalInformationId)
    {
        // 通院履歴テーブルからデータを取得
        $outpatientHistories = OutpatientHistory::where('animal_information_id', $animalInformationId)->orderBy('version', 'DESC')->cursorPaginate(10);
        return response()->json(["outpatient_Histories" => $outpatientHistories]);
    }

    /**
     * 体重履歴の取得
     */
    public function fetchBodyWeightHistory($animalInformationId)
    {
        // 体重履歴テーブルからデータを取得
        $bodyWeightHistories = BodyWeightHistory::where('animal_information_id', $animalInformationId)->orderBy('version', 'DESC')->cursorPaginate(10);
        return response()->json(["body_weight_histories" => $bodyWeightHistories]);
    }

    /**
     * ご飯履歴の取得
     */
    public function fetchFoodHistory($animalInformationId)
    {
        // ご飯履歴テーブルからデータを取得
        $foodHistories = FoodHistory::where('animal_information_id', $animalInformationId)->orderBy('version', 'DESC')->cursorPaginate(10);
        return response()->json(["food_histories" => $foodHistories]);
    }

    /**
     * ワクチン履歴の取得
     */
    public function fetchVaccinationHistory($animalInformationId)
    {
        // ワクチン履歴テーブルからデータを取得
        $vaccinationHistories = MedicineHistory::where('animal_information_id', $animalInformationId)->orderBy('version', 'DESC')->cursorPaginate(10);
        return response()->json(["vaccination_histories" => $vaccinationHistories]);
    }
}
