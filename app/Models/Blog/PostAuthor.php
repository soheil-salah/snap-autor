<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'user_id', 'byAdmin'
    ];

    public function belongsToPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function belongsToAuthor(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'user_id', 'id');
    }
}
