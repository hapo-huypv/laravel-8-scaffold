<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    public function teachers()
    {
        return $this->users()->where('role', User::ROLE_TEACHER);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }

    public function getIsJoinAttribute()
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
        return $this->users->where('role', User::ROLE_STUDENT)->count();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'target_id')->where('type', Review::TYPE_COURSE);
    }

    public function orderByReview()
    {
        return $this->reviews()->where('target_id', $this->id)->orderBy('created_at', 'DESC');
    }

    public function searchLessons($request)
    {
        return $this->lessons()->where('title', 'like', '%' .$request['keyword'].'%');
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

    public function getSuggestionsAttribute($query)
    {
        return $this->sortByRating()->get()->take(config('app.max_rate'));
    }

    public function scopeSortByRating($query)
    {
        $query = $query->withAvg('reviews', 'rate', function ($subquery) {
            $subquery->where('type', Review::TYPE_COURSE)->groupBy('target_id');
        })->orderBy('reviews_avg_rate', config('course.descending'));

        return $query;
    }

    public function getAvgRateAttribute()
    {
        return $this->reviews->where('type', Review::TYPE_COURSE)->avg('rate');
    }

    public function getTotalReviewsAttribute()
    {
        return $this->reviews->where('type', Review::TYPE_COURSE)->count();
    }

    public function getNumberRateAttribute()
    {
        $arrayNumber = array(config('app.none'), config('app.none'), config('app.none'), config('app.none'), config('app.none'));
        
        $arrayNumberRate = $this->reviews()->where('type', Review::TYPE_COURSE)->selectRaw('rate, count(*) as total')->groupBy('rate')->orderBy('rate', config('course.descending'))->get();
        
        foreach ($arrayNumberRate as $rating) {
            $arrayNumber[config('app.max_rate') - $rating->rate] = $rating->total;
        }

        return $arrayNumber;
    }
}