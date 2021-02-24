<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    use BaseResponse;

    public function getCurrentUser()
    {
        return auth()->user();
    }

    public function getCurrentUserId()
    {
        return auth()->id();
    }
}
