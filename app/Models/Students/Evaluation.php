<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    const TABLE = 'students_evaluations';
    protected $table = Self::TABLE;
    
    protected $fillable = [
        'evaluation_id',
        'student_id',
        'value',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}