<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'target_id',
        'type',
        'content',
        'rate',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
