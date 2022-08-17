<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    
    protected $table = 'friends';

    protected $fillable = ['user_1', 'user_2'];
}
