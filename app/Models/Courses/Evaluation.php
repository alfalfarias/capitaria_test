<?php

namespace App\Models\Courses;

use App\Models\Students\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    const TABLE = 'courses_evaluations';
    protected $table = Self::TABLE;

    protected $fillable = [
        'course_id',
        'name',
        'value',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_evaluations');
    }
}
