<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ClinicReview extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_review_tab';
    protected $primaryKey = 'clinics_review_id';

    protected $fillable = [
        'clinics_review_id', 'clinics_review_text', 'clinics_review_fio', 'clinics_review_date', 'clinics_id', 'clinics_review_rating', 'clinics_review_phone', 'clinics_review_email', 'clinics_review_status_id'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
