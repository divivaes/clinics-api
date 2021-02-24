<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog_tab';
    protected $primaryKey = 'blog_id';

    protected $fillable  = [
        'blog_id', 'blog_title_kz', 'blog_title_ru', 'blog_title_ko', 'blog_description_kz', 'blog_description_ru', 'blog_description_ko', 'blog_text_kz', 'blog_text_ru', 'blog_text_ko', 'blog_date', 'blog_img', 'blog_url_name', 'blog_category_id', 'user_id', 'is_active', 'view_count', 'meta_title_kz', 'meta_description_kz', 'meta_title_ru', 'meta_description_ru', 'meta_title_ko', 'meta_description_ko'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag_tab', 'blog_id', 'tag_id')->withTimestamps();
    }
}
