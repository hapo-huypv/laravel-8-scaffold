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

    public function getLearnersAttribute()
    {
        return $this->groupBy('user_id')->count();
    }
}
