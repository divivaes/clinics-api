<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class ClinicDirection extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_direction_tab';
    protected $primaryKey = 'clinics_direction_id';

    protected $fillable = [
        'clinics_direction_id', 'clinics_id', 'direction_id'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }
}
