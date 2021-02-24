<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city_tab';
    protected $primaryKey = 'city_id';

    protected $fillable = [
        'city_id', 'city_title_kz', 'city_title_ru', 'city_title_ko'
    ];
}
