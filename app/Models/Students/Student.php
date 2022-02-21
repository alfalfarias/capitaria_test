<?php

namespace App\Models\Students;

use App\Models\Courses\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    const TABLE = 'students';
    protected $table = Self::TABLE;
    
    protected $fillable = [
        'dni',
        'name',
        'surname',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'students_courses');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
