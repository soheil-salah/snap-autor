<?php

namespace App\Modules\Admins\Http\Controllers\Blogs;

use App\DataTables\Blog\PostTagDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    public function index(PostTagDataTable $dataTable)
    {
        $countTags = Tag::count();

        return $dataTable->render('admin.pages.blog.tag.index', compact('countTags'));
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        $tag == null ? abort(404) : null;

        return view('admin.pages.blog.tag.show', compact('tag'));
    }
}
