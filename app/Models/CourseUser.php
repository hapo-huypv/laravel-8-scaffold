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

    public function scopeRecord($query, $input)
    {
        if(isset(Auth::user()->id)) {   
            $user_id = Auth::user()->id;
        } else {
            $user_id = null;
        }

        $course_id = $input['course_id'];

        $query->where([
            ['course_id', $course_id],
            ['user_id', $user_id],
        ]);
        
        return $query;
    }

    public function joinCourse($input)
    {
        $record = CourseUser::record($input)->get();
        
        if (empty($input['joined']) && empty($record[0])) {
            return config('lesson.joinin');
        } elseif (empty($record[0]) && isset($input['joined'])) {
            CourseUser::create([
                'course_id' => $input['course_id'],
                'user_id' => Auth::user()->id,
            ]);

            return config('lesson.joinedin');
        } else {
            return config('lesson.joinedin');
        }
    }

    public function leaveCourse($input)
    {
        $record = CourseUser::record($input)->get();

        if ($record->isEmpty()) {
            $record = null;
        } else {
            $record = $record[0]->id;
        }

        if (isset($input['leave']) && $input['leave'] == "leave") {
            $course_user = CourseUser::withTrashed()->where('id', $record)->forceDelete();
            return config('lesson.joinin');
        }
    }
}
