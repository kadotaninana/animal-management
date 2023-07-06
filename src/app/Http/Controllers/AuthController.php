<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //認証ボタンが押されたらデータベースと照合
        if (Auth::attempt($request->only(["email", "password"]))) {

            //emailとパスワードがデータベースと一致したらステータス２００でログイン情報を返す
            return response()->json(['message' => 'ログイン成功'], 200);
        } else {
            // 失敗したら、401を返す。
            return response()->json(['message' => 'ログイン失敗'], 401);
        }
    }
    public function Logout()
    {
        //ログアウトボタンを押されたらログアウトをする
        Auth::logout();

        //ログアウトできたら表示する
        return response()->json(['message' => 'ログアウト完了'], 200);
    }
}
