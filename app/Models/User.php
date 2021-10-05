<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CourseUser;

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
        return $this->belongsToMany(Course::class, 'course_users', 'user_id', 'course_id')->using(CourseUser::class);
    }
    
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }

    public function scopeTeachers()
    {
        $teachers = User::where('role', User::ROLE_TEACHER);

        return $teachers;
    }

    // public function scopeUser($query, $input)
    // {
    //     if(isset($input['course_id']) && isset($input['user_id'])) {
    //         $user_id = $input['user_id'];
    //         $course_id = $input['course_id'];

    //         $query = $query->whereHas('courses', function ($subquery) use ($course_id, $user_id) {
    //             $subquery->where('course_id', $course_id)->where('user_id', $user_id);
    //         });
    //     }

    //     return $query;
    // }
}
