<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Review extends Model
{
    const TYPE_COURSE = 0;
    const TYPE_LESSON = 1;

    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'targer_id',
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
                    'targer_id' => $courseId,
                    'type' => Review::TYPE_COURSE,
                    'rate' => $review['star'],
                    'content' => $review['course_review'],
                ]
            );
        } else {
            $userId = null;
        }
    }
}
