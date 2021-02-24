<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country_tab';
    protected $primaryKey = 'country_id';

    protected $fillable = [
        'country_id', 'country_title_kz', 'country_title_ru', 'country_title_ko'
    ];
}
