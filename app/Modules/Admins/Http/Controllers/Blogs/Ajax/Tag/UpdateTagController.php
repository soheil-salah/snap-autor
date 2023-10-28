<?php

namespace App\Modules\Admins\Http\Controllers\Blogs\Ajax\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdateTagController extends Controller
{
    public function __invoke(Request $request)
    {
        $tag_id = $request->tag_id;
        $tag = $request->tag;

        $request->validate([
            'tag' => ['required', 'string', 'max:255', 'unique:tags,name']
        ],[
            'tag' => 'Tag name is taken'
        ]);

        Tag::where('id', $tag_id)->update([
            'name' => $tag,
            'slug' => Str::slug($tag)
        ]);
    }
}
