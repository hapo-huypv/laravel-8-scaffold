<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tags');
    }

    public function scopeTags($query, $course_id)
    {
        $query = $query->whereHas('courses', function ($subquery) use ($course_id) {
            $subquery->where('course_id', $course_id);
        });
    }
}
