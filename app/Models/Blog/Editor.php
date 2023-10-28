<?php

namespace App\Models\Blog;

use App\Models\Users\User;
use App\Modules\Admins\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Editor extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'user_id',
    ];

    public function belongsToAdmin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function belongsToUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
