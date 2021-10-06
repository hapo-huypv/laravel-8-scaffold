<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Course;
use Auth;

class CourseUser extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'course_users';

    protected $fillable = [
        'course_id',
        'user_id',
    ];

    public function scopeRecord($query, $id)
    {
        if (isset(Auth::user()->id)) {
            $userId = Auth::user()->id;
        } else {
            $userId = null;
        }

        $courseId = $id;

        $query->where([
            ['course_id', $courseId],
            ['user_id', $userId],
        ]);
        
        return $query;
    }

    public function status($id)
    {
        $record = CourseUser::record($id)->get();

        if (empty($record[0])) {
            return config('course.joinin');
        } else {
            return config('course.joinedin');
        }
    }
}
