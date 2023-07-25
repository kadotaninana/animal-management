<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //認証ボタンが押されたらデータベースと照合
        if (Auth::attempt($request->only(["email", "password"]))) {

            $user = User::whereEmail($request->email)->first(); //トークンの作成と取得

            $user->tokens()->delete();
            $token = $user->createToken("auth-token")->plainTextToken;

            //ログインが成功するとtokenを返す。
            return response()->json(['token' => $token], Response::HTTP_OK);
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
