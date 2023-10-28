<?php

namespace App\Models\Users;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Blog\Author;
use App\Models\Blog\Editor;
use App\Models\Users\UserBan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function info(): HasOne
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    public function ban(): HasOne
    {
        return $this->hasOne(UserBan::class, 'user_id', 'id');
    }

    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }

    public function author(): HasOne
    {
        return $this->hasOne(Author::class, 'user_id', 'id');
    }

    public function editor(): HasOne
    {
        return $this->hasOne(Editor::class, 'user_id', 'id');
    }
}
