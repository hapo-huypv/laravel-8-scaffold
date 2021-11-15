<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CourseUser;
use Carbon\Carbon;
use Auth;

class User extends Authenticatable
{
    const ROLE_STUDENT = 0;
    const ROLE_TEACHER = 1;
    const ROLE_ADMIN = 2;

    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avartar',
        'address',
        'phone',
        'birthday',
        'intro',
        'role',
        'google',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_users', 'user_id', 'course_id');
    }
    
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_users', 'user_id', 'lesson_id');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_users', 'user_id', 'program_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTeachers()
    {
        $teachers = User::where('role', User::ROLE_TEACHER);

        return $teachers;
    }

    public function scopeCourseTeachers($query, $courseId)
    {
        $query = $query->whereHas('courses', function ($subquery) use ($courseId) {
            $subquery->where('course_id', $courseId);
        })->where('role', User::ROLE_TEACHER);

        return $query;
    }

    public function scopeLessonTeachers($query, $lessonId)
    {
        $query = $query->whereHas('lessons', function ($subquery) use ($lessonId) {
            $subquery->where('lesson_id', $lessonId);
        })->where('role', User::ROLE_TEACHER);

        return $query;
    }

    public function updateInfo($request, $user)
    {
        $user->update([
            'name' => $request['profile_name'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'intro' => $request['about_me'],
        ]);
    }

    public function updateImg($request, $user)
    {
        $image = $request->file('image');
        $image->move(storage_path('app/public/user'), $user->id.'.'.$image->getClientOriginalName());
        
        $user->avatar = 'storage/user/'. $user->id.'.'.$image->getClientOriginalName();
        $user->save();
    }

    public function getDateOfBirthAttribute()
    {
        return Carbon::parse($this->birthday)->format('d/m/Y');
    }
}
