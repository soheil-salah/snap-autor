<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'post_category_id', 'title', 'short_description', 'content', 'isPublished', 'slug', 'posted_at',
    ];

    public function belongsToCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    public function author(): HasOne
    {
        return $this->hasOne(PostAuthor::class, 'post_id', 'id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(PostTag::class, 'post_id', 'id');
    }
}
