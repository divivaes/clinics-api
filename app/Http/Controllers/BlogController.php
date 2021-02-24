<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function index()
    {
        $blog = Blog::query()->with(['category', 'tags'])->paginate(20);

        return $this->successResponse(
            [
                'blog' => $blog
            ],
            200,
            'Запрос успешно завершен'
        );
    }

    public function show(Blog $blog)
    {
        return $this->successResponse(
            [
                'blog' => $blog->load(['category', 'tags'])
            ],
            200,
            'Запрос успешно завершен'
        );
    }
}
