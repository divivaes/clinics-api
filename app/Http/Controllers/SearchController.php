<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Clinic;
use App\Models\Direction;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function autocomplete(Request $request)
    {
        if (!$request->query('query')) {
            return $this->errorResponse(
                404,
                'Отсутствует нужный ключ для поиска',
                ''
            );
        }

        $key = $request->query('query');

        $clinics = Clinic::query()
            ->select('clinics_title_kz', 'clinics_title_ru', 'clinics_address_kz', 'clinics_address_ru')
            ->where('clinics_title_kz', 'like', '%' . $key . '%')
            ->orWhere('clinics_title_ru', 'like', '%' . $key . '%')
            ->orWhere('clinics_address_kz', 'like', '%' . $key . '%')
            ->orWhere('clinics_address_ru', 'like', '%' . $key . '%')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $doctors = Doctor::query()
            ->where('doctor_title_kz', 'like', '%' . $key . '%')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $directions = Direction::query()
            ->where('direction_title_kz', 'like', '%' . $key . '%')
            ->orWhere('direction_title_ru', 'like', '%' . $key . '%')
            ->with(['clinics' => function ($query) {
                $query->select('clinics_title_kz', 'clinics_title_ru', 'clinics_address_kz', 'clinics_address_ru');
            }])
            ->limit(5)
            ->get();

        $blog = Blog::query()
            ->select('blog_title_kz', 'blog_title_ru', 'blog_description_ru', 'blog_description_kz')
            ->where('blog_title_kz', 'like', '%' . $key . '%')
            ->orWhere('blog_title_ru', 'like', '%' . $key . '%')
            ->limit(5)
            ->get();

        return $this->successResponse(
            [
                'clinics' => $clinics,
                'directions' => $directions,
                'doctors' => $doctors,
                'blog' => $blog
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function search(Request $request)
    {
        if (!$request->query('query')) {
            return $this->errorResponse(
                404,
                'Отсутствует нужный ключ для поиска',
                ''
            );
        }

        $key = $request->query('query');

        $clinics = Clinic::query()
            ->select('clinics_id', 'clinics_title_kz', 'clinics_title_ru', 'clinics_address_kz', 'clinics_address_ru')
            ->where('clinics_title_kz', 'like', '%' . $key . '%')
            ->orWhere('clinics_title_ru', 'like', '%' . $key . '%')
            ->orWhere('clinics_address_kz', 'like', '%' . $key . '%')
            ->orWhere('clinics_address_ru', 'like', '%' . $key . '%')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $doctors = Doctor::query()
            ->where('doctor_title_kz', 'like', '%' . $key . '%')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        $directions = Direction::query()
            ->where('direction_title_kz', 'like', '%' . $key . '%')
            ->orWhere('direction_title_ru', 'like', '%' . $key . '%')
            ->with(['clinics' => function ($query) {
                $query->select('clinics_id', 'clinics_title_kz', 'clinics_title_ru', 'clinics_address_kz', 'clinics_address_ru');
            }])
            ->limit(5)
            ->get();

        $blog = Blog::query()
            ->select('blog_id', 'blog_title_kz', 'blog_title_ru', 'blog_description_ru', 'blog_description_kz')
            ->where('blog_title_kz', 'like', '%' . $key . '%')
            ->orWhere('blog_title_ru', 'like', '%' . $key . '%')
            ->limit(5)
            ->get();

        return $this->successResponse(
            [
                'clinics' => $clinics,
                'directions' => $directions,
                'doctors' => $doctors,
                'blog' => $blog
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
