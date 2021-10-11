<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Program extends Model
{
    const TYPE_LESSON = 0;
    const TYPE_PDF = 1;
    const TYPE_VIDEO = 2;

    use HasFactory, SoftDeletes;

    protected $table = 'program';

    protected $fillable = [
        'lesson_id',
        'name',
        'type',
        'path',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function scopePrograms($query, $lessonId)
    {
        $query = $query->where('lesson_id', $lessonId);
        
        return $query;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'program_users', 'program_id', 'user_id');
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

    public function scopeLearnedPrograms($query, $lessonId)
    {
        if (isset(Auth::user()->id)) {
            $userId = Auth::user()->id;
        } else {
            $userId = null;
        }

        $query = $query->where('lesson_id', $lessonId)
                        ->whereHas('users', function ($subquery) use ($userId) {
                            $subquery->where('user_id', $userId);
                        });

        return $query;
    }
}
