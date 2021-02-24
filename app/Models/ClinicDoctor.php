<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ClinicDoctor extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_doctor_tab';
    protected $primaryKey = 'clinics_doctor_id';

    protected $fillable = [
        'clinics_doctor_id', 'clinics_id', 'doctor_id'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
