<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Illness extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'illness_tab';
    protected $primaryKey = 'illness_id';

    protected $fillable = [
        'illness_id', 'illness_title_kz', 'illness_title_ru', 'illness_title_ko', 'direction_id', 'illness_img', 'is_popular_illness'
    ];

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_illness_tab', 'illness_id', 'doctor_id')->withPivot(['doctor_illness_price']);
    }
}
