<?php

namespace App\Modules\Admins\Http\Controllers\Blogs;

use App\DataTables\Blog\PostCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(PostCategoryDataTable $dataTable)
    {
        $countPostCategory = PostCategory::count();

        return $dataTable->render('admin.pages.blog.category.index', compact('countPostCategory'));
    }

    public function create()
    {
        return view('admin.pages.blog.post.create');    
    }
}
