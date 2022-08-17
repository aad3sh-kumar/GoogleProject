<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'author', 'text', 'title', 'votes'
    ];

    public function comments() {
        return $this->hasMany(Discussion::class, 'post');
    }
}
