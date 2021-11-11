<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'filepath',
        'post_id',
    ];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
