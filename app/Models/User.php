<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use HasFactory, Notifiable, HasApiTokens, Auditable;

    protected $table = 'user_tab';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'fio', 'email', 'role_id', 'is_blocked', 'date_last_login', 'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_last_login'   => 'datetime'
    ];

    public function isBlocked()
    {
        return $this->is_blocked == true;
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'role_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
}
