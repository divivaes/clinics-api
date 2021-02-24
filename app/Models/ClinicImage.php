<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ClinicImage extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_img_tab';
    protected $primaryKey = 'clinics_img_id';

    protected $fillable = [
        'clinics_img_id', 'clinics_id', 'clinics_imgname'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
