<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends BaseController
{
    public function index()
    {
        $doctors = Doctor::query()->with(['specilities', 'illnesses'])->paginate(10);

        return $this->successResponse(
            [
                'doctors' => $doctors
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function show(Doctor $doctor)
    {
        return $this->successResponse(
            [
                'doctor' => $doctor->load(['specilities', 'illnesses'])
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
