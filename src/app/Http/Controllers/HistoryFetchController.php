<?php

namespace App\Http\Controllers;

use App\Models\AnimalInformation;
use App\Models\MedicineHistory;
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
}
