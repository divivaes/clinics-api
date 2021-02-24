<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Clinic extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'clinics_tab';
    protected $primaryKey = 'clinics_id';

    protected $fillable = [
        'clinics_id', 'clinics_title_kz', 'clinics_title_ru', 'clinics_title_ko', 'clinics_img', 'country_id', 'city_id', 'clinics_rating', 'clinics_price', 'clinics_translator_kz', 'clinics_translator_ru', 'clinics_translator_ko', 'clinics_visa_kz', 'clinics_visa_ru', 'clinics_visa_ko', 'clinics_prepay_kz', 'clinics_prepay_ko', 'clinics_prepay_ru', 'clinics_pay_ru', 'clinics_pay_kz', 'clinics_pay_ko', 'clinics_transfer_kz', 'clinics_transfer_ru', 'clinics_transfer_ko', 'clinics_documents_lang_kz', 'clinics_documents_lang_ru', 'clinics_documents_lang_ko', 'clinics_description_kz', 'clinics_description_ru', 'clinics_description_ko',  'clinics_address_ru', 'clinics_address_kz', 'clinics_address_ko', 'clinics_video', 'clinics_url_name', 'view_count', 'google_map_link', 'meta_title_kz', 'meta_title_ru', 'meta_description_ru', 'meta_description_kz', 'is_popular'
    ];

    public function images()
    {
        return $this->hasMany(ClinicImage::class, 'clinics_id');
    }

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, 'clinics_illness_tab', 'clinics_id', 'illness_id')->withTimestamps()->withPivot('clinics_illness_price');
    }

    public function files()
    {
        return $this->hasMany(ClinicFile::class, 'clinics_id');
    }

    public function reviews()
    {
        return $this->hasMany(ClinicReview::class, 'clinics_id');
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class, 'clinics_direction_tab', 'clinics_id', 'direction_id')->withTimestamps();
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'clinics_doctor_tab', 'clinics_id', 'doctor_id')->withTimestamps();
    }
}
