<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'body',
        'img_path',
        'user_id',
    ];

    protected $attributes = [
        'status' => 'active',
    ];

    /**
     * Get the messages that belong to this post.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that owns this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
