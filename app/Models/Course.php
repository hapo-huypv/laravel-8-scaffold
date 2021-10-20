<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Review;
use Auth;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'logo_path',
        'description',
        'intro',
        'learn_time',
        'quizzes',
        'price',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getNumberLessonAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimeAttribute($id)
    {
        return $this->lessons()->sum('learn_time');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
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

    public function getNumberUserAttribute()
    {
        return $this->users()->where('role', User::ROLE_STUDENT)->count();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'targer_id')->where('type', Review::TYPE_COURSE);
    }

    public function scopeFilter($query, $dataRequest)
    {
        if (isset($dataRequest['keyword'])) {
            $keyword = $dataRequest['keyword'];
            $query = $query->where('title', 'like', "%$keyword%")->orWhere('intro', 'like', "%$keyword%");
        }

        if (isset($dataRequest['teachers'])) {
            $teachers = $dataRequest['teachers'];
            $query = $query->whereHas('users', function ($subquery) use ($teachers) {
                $subquery->where('user_id', $teachers);
            });
        }

        if (isset($dataRequest['number_learners'])) {
            $query = $query->withCount([
                'users as users_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
            ])->orderBy('users_count', $dataRequest['number_learners']);
        }

        if (isset($dataRequest['number_lessons'])) {
            $query = $query->withCount([
                'lessons as lessons_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
            ])->orderBy('lessons_count', $dataRequest['number_lessons']);
        }
        
        if (isset($dataRequest['study_time'])) {
            $query = $query->withSum('lessons', 'learn_time', function ($subquery) {
                $subquery->groupBy('course_id');
            })->orderBy('lessons_sum_learn_time', $dataRequest['study_time']);
        }

        if (isset($dataRequest['tags'])) {
            $tags = $dataRequest['tags'];
            $query = $query->whereHas('tags', function ($subquery) use ($tags) {
                $subquery->where('tag_id', $tags);
            });
        }

        if (isset($dataRequest['reviews'])) {
            $query = $query->whereHas('reviews', function ($subquery) {
                $subquery->where('type', Review::TYPE_COURSE);
            })->withAvg('reviews', 'rate', function ($subquery) {
                $subquery->groupBy('target_id');
            })->orderBy('reviews_avg_rate', $dataRequest['reviews']);
        }

        if (isset($dataRequest['status'])) {
            if ($dataRequest['status'] == config('course.newest')) {
                $query = $query->orderBy('id', config('course.ascending', 'asc'));
            } elseif ($dataRequest['status'] == config('course.oldest')) {
                $query = $query->orderBy('id', config('cousre.descending', 'desc'));
            }
        }
        
        return $query;
    }

    public function scopeSuggestions($query)
    {
        $query = $query->inRandomOrder()->limit(5);

        return $query;
    }

    public function scopeByUser($query, $userId)
    {
        $query = $query->whereHas('users', function ($subquery) use ($userId) {
            $subquery->where('user_id', $userId);
        });

        return $query;
    }

    public function getCourseCountAttribute()
    {
        return $this->count();
    }

    public function getCountFivestarAttribute()
    {
        return $this->reviews->where('rate', config('course.star_five'))->count();
    }

    public function getCountFourstarAttribute()
    {
        return $this->reviews->where('rate', config('course.star_four'))->count();
    }

    public function getCountThreestarAttribute()
    {
        return $this->reviews->where('rate', config('course.star_three'))->count();
    }

    public function getCountTwostarAttribute()
    {
        return $this->reviews->where('rate', config('course.star_two'))->count();
    }

    public function getCountOnestarAttribute()
    {
        return $this->reviews->where('rate', config('course.star_one'))->count();
    }

    public function getAvgRateAttribute()
    {
        return $this->reviews->avg('rate');
    }

    public function getCountRateAttribute()
    {
        return $this->reviews->count();
    }

    public function getPercentFivestarAttribute()
    {
        if ($this->count_fivestar != 0) {
            return ($this->count_fivestar / $this->count_rate) * 100;
        }
    }

    public function getPercentFourstarAttribute()
    {
        if ($this->count_fourstar != 0) {
            return ($this->count_fourstar / $this->count_rate) * 100;
        }
    }

    public function getPercentThreestarAttribute()
    {
        if ($this->count_threestar != 0) {
            return ($this->count_threestar / $this->count_rate) * 100;
        }
    }

    public function getPercentTwostarAttribute()
    {
        if ($this->count_twostar != 0) {
            return ($this->count_twostar / $this->count_rate) * 100;
        }
    }

    public function getPercentOnestarAttribute()
    {
        if ($this->count_onestar != 0) {
            return ($this->count_onestar / $this->count_rate) * 100;
        }
    }
}
