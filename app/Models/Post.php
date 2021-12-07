<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'price',
        'views',
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
     * Get the iamges that belong to this post.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get the user that owns this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
