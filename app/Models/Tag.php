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

    public function scopeTags($query, $courseId)
    {
        $query = $query->whereHas('courses', function ($subquery) use ($courseId) {
            $subquery->where('course_id', $courseId);
        });
    }
}
