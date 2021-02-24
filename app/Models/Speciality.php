<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Speciality extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'doctor_speciality_tab';
    protected $primaryKey = 'doctor_speciality_id';

    protected $fillable = [
        'doctor_speciality_id', 'doctor_speciality_title_kz', 'doctor_speciality_title_ru', 'doctor_speciality_title_ko'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'speciliaty_doctor_tab', 'doctor_speciality_id', 'doctor_id');
    }
}
