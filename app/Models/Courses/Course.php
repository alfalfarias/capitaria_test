<?php

namespace App\Models\Courses;

use App\Models\Students\Student;
use App\Models\Teachers\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const TABLE = 'courses';
    protected $table = Self::TABLE;
    
    protected $fillable = [
        'teacher_id',
        'name',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_courses');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
