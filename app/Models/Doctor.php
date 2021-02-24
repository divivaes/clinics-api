<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Doctor extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'doctor_tab';
    protected $primaryKey = 'doctor_id';

    protected $fillable = [
        'doctor_id', 'doctor_title_kz', 'doctor_title_ru', 'doctor_title_ko', 'doctor_description_kz', 'doctor_description_ru', 'doctor_description_ko', 'doctor_experience_kz', 'doctor_experience_ru', 'doctor_experience_ko', 'doctor_text_kz', 'doctor_text_ru', 'doctor_text_ko', 'doctor_img', 'doctor_price', 'doctor_url_name', 'view_count', 'doctor_lang_kz', 'doctor_lang_ru', 'doctor_lang_ko', 'meta_title_kz', 'meta_title_ru', 'meta_title_ko', 'meta_description_kz', 'meta_description_ru', 'meta_description_ko', 'doctor_monday_time', 'doctor_tuesday_time', 'doctor_wednesday_time', 'doctor_thursday_time', 'doctor_friday_time', 'doctor_saturday_time', 'doctor_sunday_time'
    ];

    public function specilities()
    {
        return $this->belongsToMany(Speciality::class, 'speciliaty_doctor_tab', 'doctor_id', 'doctor_speciality_id');
    }

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, 'doctor_illness_tab', 'doctor_id', 'illness_id')->withPivot(['doctor_illness_price']);
    }
}
