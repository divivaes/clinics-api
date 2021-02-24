<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DoctorIllness extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'doctor_illness_tab';
    protected $primaryKey = 'doctor_illness_id';

    protected $fillable = [
        'doctor_illness_id', 'illness_id', 'doctor_id', 'doctor_illness_price'
    ];

    public function illness()
    {
        return $this->belongsTo(Illness::class, 'illness_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
