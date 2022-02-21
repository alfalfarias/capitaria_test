<?php

namespace App\Models\Teachers;

use App\Models\Courses\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    const TABLE = 'teachers';
    protected $table = Self::TABLE;
    
    protected $fillable = [
        'dni',
        'name',
        'surname',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
