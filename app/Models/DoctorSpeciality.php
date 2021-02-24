<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DoctorSpeciality extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'speciality_doctor_tab';
    protected $primaryKey = 'speciality_doctor_id';

    protected $fillable = [
        'speciality_doctor_id', 'doctor_speciality_id', 'doctor_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'doctor_speciality_id');
    }
}
