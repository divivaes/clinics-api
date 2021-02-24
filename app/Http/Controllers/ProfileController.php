<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    public function logout()
    {
        Auth::guard('web')->logout();

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
