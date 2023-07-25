<?php

namespace App\Http\Controllers;

use App\Domain\UseCase\HistorySave;
use App\Domain\ValueObject\BirthDate;
use App\Domain\ValueObject\Medicine\MedicineList;
use App\Domain\ValueObject\Medicine\UseStartDate;
use App\Http\Requests\HistorySaveRequest;
use App\Models\AnimalInformation;
use App\Models\BodyWeightHistory;
use App\Models\FoodHistory;
use App\Models\MedicineHistory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnimalManagementController extends Controller
{
    protected $historySaveService;

    public function __construct(HistorySave $historySaveService)
    {
        $this->historySaveService = $historySaveService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 動物情報登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            // 名前、誕生日、来た日の入力が埋まっているかチェック
            $request->validate([
                'animal_name' => 'required',
                'birthday' => 'required|date',
                'came' => 'required|date',
                'start_at' => 'required|date',
                'body_weight' => 'required|numeric'
            ]);

            //年齢を自動出力
            $birthDate = new BirthDate($request->birthday);
            $age = $birthDate->age();

            //データベースに動物基本情報を登録
            $animalInformation = new AnimalInformation;
            $animalInformation->animal_name = $request->animal_name;
            $animalInformation->birthday = $request->birthday;
            $animalInformation->age = $age;
            $animalInformation->came = $request->came;
            $animalInformation->user_id = "1";
            $animalInformation->save();

            // 体重履歴の保存
            $param = [
                'start_at' => Carbon::parse($request->start_at)->startOfDay(),
                'body_weight' => $request->body_weight,
                'unit' => $request->unit,
            ];
            $this->historySaveService->save($param, $animalInformation->id, new BodyWeightHistory());
        });

        return response()->json(['message' => '登録完了']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // データ取得
        $animalInformation = AnimalInformation::with(["medicineHistories"])->find($id);
        // レスポンスを返す
        return response()->json(['animal_info' => $animalInformation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HistorySaveRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $this->historySaveService->save($request->input('medicine_histories'), $id, new MedicineHistory());
        });

        return response()->json(['message' => '登録完了']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
