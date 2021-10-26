<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Carbon\Carbon;

class Review extends Model
{
    const TYPE_COURSE = 0;
    const TYPE_LESSON = 1;

    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'target_id',
        'type',
        'content',
        'rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'target_id');
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'target_id');
    }

    public function setUserNameAttribute($userName)
    {
        $this->attributes['user_name'] = ucfirst($userName);
    }

    public function createReviewCourse($review, $courseId)
    {
        if (isset(Auth::user()->id)) {
            $userId = Auth::user()->id;

            Review::create(
                [
                    'user_id' => $userId,
                    'target_id' => $courseId,
                    'type' => Review::TYPE_COURSE,
                    'rate' => $review['star'],
                    'content' => $review['course_review'],
                ]
            );
        } else {
            $userId = null;
        }
    }

    public function scopeReviewByCourse($query, $courseId)
    {
        $query = $query->where([
            'type' => Review::TYPE_COURSE,
            'target_id' => $courseId,
        ])->orderBy('created_at', 'DESC');

        return $query;
    }

    public function getFiveStarAttribute()
    {
        return $this->where('rate', 5)->count();
    }

    public function getDateAttribute()
    {
        $ddmmyy = Carbon::now();
        $ddmmyy = $this['created_at'];

        return $ddmmyy->toFormattedDateString();
    }

    public function getTimeAttribute()
    {
        $ddmmyy = Carbon::now();
        $ddmmyy = $this['created_at'];

        return $ddmmyy->toTimeString();
    }

    public function getAvatarAttribute()
    {
        return $this->user->avatar;
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
