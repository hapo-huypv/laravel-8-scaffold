<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use Auth;

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
        return $this->belongsToMany(User::class, 'lesson_users', 'lesson_id', 'user_id');
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function getNumberUserAttribute()
    {
        return $this->users()->where('role', User::ROLE_STUDENT)->count();
    }

    public function getJoinAttribute()
    {
        if (isset(Auth::user()->id)) {
            $userId = Auth::user()->id;
        } else {
            $userId = null;
        }

        return $this->users()->where('user_id', $userId)->count();
    }

    public function scopeLessonsInCourse($query, $array)
    {
        $keyword = $array[config('lesson.first')];
        $courseId = $array[config('lesson.second')];
        if (isset($keyword)) {
            $query = $query->where('course_id', $courseId)->where('title', 'like', "%$keyword%");
        } else {
            $query = $query->where('course_id', $courseId);
        }
        return $query;
    }

    public function getNumberProgramAttribute()
    {
        return $this->programs()->count();
    }

    public function getNumberProcessAttribute()
    {
        $learnedLesson = Program::learnedPrograms($this->id)->get();
        $numberLearnedLesson = count($learnedLesson);
     
        if ($this->getNumberProgramAttribute() != 0) {
            $process = $numberLearnedLesson / $this->getNumberProgramAttribute();
            
            return $process * 100;
        } else {
            return 0;
        }
    }

    public function setProcessAttribute($value)
    {
        $this->attributes['process'] = strtolower($value);
    }
}
