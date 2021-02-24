<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag_tab';
    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'tag_id', 'tag_title_kz', 'tag_title_ru', 'tag_title_ko', 'tag_url_name'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag_tab', 'tag_id', 'blog_id');
    }
}
