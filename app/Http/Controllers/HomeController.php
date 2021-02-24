<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Direction;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    public function index()
    {
        $blog = Blog::query()->orderByDesc('created_at')->get()->take(5);
        $doctors = Doctor::query()->orderByDesc('created_at')->get()->take(5);

        return $this->successResponse(
            [
                'blog' => $blog,
                'doctors' => $doctors
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function directions()
    {
        $directions = Direction::query()->orderBy('direction_id', 'asc')->get();

        return $this->successResponse(
            [
                'directions' => $directions
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function staticInfo()
    {
        $data = DB::table('static_info_tab')
            ->join('static_info_type_tab', 'static_info_tab.static_info_type_id', '=', 'static_info_type_tab.static_info_type_id')
            ->get();

        return $this->successResponse(
            [
                'info' => $data
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
