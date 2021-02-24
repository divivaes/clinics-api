<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role_tab';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_id', 'role_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
