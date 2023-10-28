<?php

namespace App\Modules\Admins\Http\Controllers\Blogs\Ajax\Category;

use App\Http\Controllers\Controller;
use App\Models\Blog\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreatePostCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:255', 'unique:post_categories,name']
        ],[
            'category' => 'Choose another name for the category'
        ]);

        PostCategory::create([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
        ]);
    }
}
