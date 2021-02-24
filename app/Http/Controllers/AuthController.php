<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(LoginRequest $request)
    {
        try {
            $user = auth()->attempt($request->all());

            if (!$user) {
                return $this->errorResponse(
                    422,
                    'Введенные Вами данные не совпадают'
                );
            }

            $token = auth()->user()->createToken(config('app.name'))->accessToken;

        } catch (\Exception $e) {
            return $this->errorResponse(
                401,
                'Ошибка при авторизации',
                $e->getMessage()
            );
        }

        if (!$user->isBlocked()) {
            return $this->errorResponse(
                403,
                'Ваша учетная запись заблокирована'
            );
        }

        return $this->successResponse(
            [
                'user' => $user,
                'token_type' => 'Bearar',
                'token' => $token
            ],
            200,
            'Вы успешно авторизовались'
        );
    }

    public function register(RegisterRequest $request)
    {
        $request['is_blocked'] = true;

        try {
            $user = User::create($request->all());

            auth()->login($user);

            $token = auth()->user()->createToken(config('app.name'))->accessToken;
        } catch (\Exception $exception) {
            return $this->errorResponse(
                500,
                'Произошла ошибка при регистрации. Проверьте отправленные вами данные',
                $exception->getMessage()
            );
        }

        return $this->successResponse(
            [
                'user' => $user,
                'token_type' => 'Bearar',
                'token' => $token
            ],
            201,
            'Вы успешно авторизовались'
        );
    }
}
