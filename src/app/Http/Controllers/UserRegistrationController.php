<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    public function register(UserRegistrationRequest $request)
    {

        // 登録済みのメールアドレス情報ではないか
        $existence = \App\Models\User::where('email', '=', $request->input('email'))->exists();

        if ($existence == false) {

            // 問題なければデータベースに登録
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['message' => '登録完了']);
        }

        // 問題ありならエラーメッセージを返す
        else {
            return response()->json(['message' => '入力に誤りがあります'], 422);
        }
    }
}
