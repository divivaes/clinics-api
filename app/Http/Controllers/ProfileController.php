<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    public function logout()
    {
        auth()->guard()->logout();

        return $this->successResponse(
            null,
            200,
            'Вы успешно вышли из системы'
        );
    }

    public function me()
    {
        $user = auth()->user();

        return $this->successResponse(
            [
                'user' => $user
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
