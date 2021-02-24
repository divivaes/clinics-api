<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ClinicIllness extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_illness_tab';
    protected $primaryKey = 'clinics_illness_id';

    protected $fillable = [
        'clinics_illness_id', 'illness_id', 'clinics_id', 'clinics_illness_price'
    ];

    public function illness()
    {
        return $this->belongsTo(Illness::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
