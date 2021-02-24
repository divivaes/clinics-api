<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Direction extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'direction_tab';
    protected $primaryKey = 'direction_id';

    protected $fillable = [
        'direction_id', 'direction_title_kz', 'direction_title_ru', 'direction_title_ko', 'direction_img', 'is_popular_direction', 'direction_order_num'
    ];
}
