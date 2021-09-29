<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\CourseUser;

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
        return $this->belongsToMany(Tag::class, 'course_tags')->using(CourseTag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users')->using(CourseUser::class);
    }

    public function getNumberUserAttribute()
    {
        return $this->users()->count();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function courses()
    {
        $courses = Course::select('*')->paginate(1000);

        return $courses;
    }

    public function scopeFilter($query, $request)
    {
        if ($request['keyword'] != null) {
            $keyword = $request['keyword'];
            $query = $query->where('title', 'like', "%$keyword%");
        }

        if ($request->query('filterByTeachers') != null) {
            $teachers = $request->query('filterByTeachers');
            $query = $query->whereHas('users', function ($subquery) use ($teachers) {
                $subquery->where('user_id', $teachers);
            });
        }

        if ($request->query('filterByLearners') == config('course.ascending')) {
            $query = $query->withCount([
                'users as users_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
            ])->orderBy('users_count', 'ASC');
        } elseif ($request->query('filterByLearners') == config('course.descending')) {
            $query = $query->withCount([
                'users as users_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
            ])->orderBy('users_count', 'DESC');
        }

        if ($request->query('filterByLessons') == config('course.ascending')) {
            $query = $query->withCount([
                'lessons as lessons_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
                    ])->orderBy('lessons_count', 'ASC');
        } elseif ($request->query('filterByLessons') == config('course.descending')) {
            $query = $query->withCount([
                'lessons as lessons_count' => function ($subquery) {
                    $subquery->groupBy('course_id');
                }
                    ])->orderBy('lessons_count', 'DESC');
        }

        if ($request->query('filterByTime') == config('course.ascending')) {
            $query = $query->withSum('lessons', 'learn_time', function ($subquery) {
                $subquery->groupBy('course_id');
            })->orderBy('lessons_sum_learn_time', 'ASC');
        } elseif ($request->query('filterByTime') == config('course.descending')) {
            $query = $query->withSum('lessons', 'learn_time', function ($subquery) {
                $subquery->groupBy('course_id');
            })->orderBy('lessons_sum_learn_time', 'DESC');
        }

        if ($request->query('filterByTags') != null) {
            $tags = $request->query('filterByTags');
            $query = $query->whereHas('tags', function ($subquery) use ($tags) {
                $subquery->where('tag_id', $tags);
            });
        }

        if ($request->query('filterByReviews') == config('course.ascending')) {
            $query = $query->orderBy('created_at', 'ASC');
        } elseif ($request->query('filterByReviews') == config('course.descending')) {
            $query = $query->orderBy('created_at', 'DESC');
        }

        if ($request->query('status') != null) {
            if ($request->query('status') == 'newest') {
                $query = $query->orderBy('id', 'ASC');
            } elseif ($request->query('status') == 'oldest') {
                $query = $query->orderBy('id', 'DESC');
            }
        }
        
        return $query;
    }
}
