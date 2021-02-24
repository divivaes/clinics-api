<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ClinicFile extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_file_tab';
    protected $primaryKey = 'clinics_file_id';

    protected $fillable = [
        'clinics_file_id', 'clinics_id', 'clinics_filename'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
