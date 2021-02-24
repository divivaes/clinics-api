<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category_tab';
    protected $primaryKey = 'blog_category_id';

    protected $fillable = [
        'blog_category_id', 'blog_category_title_kz', 'blog_category_title_ru', 'blog_category_title_ko', 'blog_category_url_name', 'meta_title_kz', 'meta_description_kz', 'meta_title_ru', 'meta_description_ru', 'meta_title_ko', 'meta_description_ko'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }
}
