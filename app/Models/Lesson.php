<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lessons';

    protected $fillable = [
        'course_id',
        'title',
        'learn_time',
        'description',
        'video',
        'requirement',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeLessons($query, $input)
    {
        if (isset($input['course_id'])) {
            $query = $query->where('course_id', $input['course_id']);
        }
        
        if (isset($input['keyword'])) {
            $keyword = $input['keyword'];
            $query = $query->where('title', 'like', "%$keyword%");
        }

        return $query;
    }
}
