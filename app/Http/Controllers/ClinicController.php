<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Direction;
use Illuminate\Http\Request;

class ClinicController extends BaseController
{
    public function index()
    {
        $clinics = Clinic::query()->with(['images', 'illnesses', 'files', 'reviews', 'directions', 'doctors'])->paginate(10);

        return $this->successResponse(
            [
                'clinics' => $clinics
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function show(Clinic $clinic)
    {
        return $this->successResponse(
            [
                'clinic' => $clinic->load(['images', 'illnesses', 'files', 'reviews', 'directions', 'doctors'])
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
