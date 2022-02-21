<?php

namespace App\Services\Students\CreateEvaluation;

use App\Models\Courses\Evaluation as CourseEvaluation;
use App\Models\Students\Student as Student;
use App\Models\Students\Evaluation as StudentEvaluation;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'student_id' => 'required|exists:'.Student::TABLE.',id',
      'evaluation_id' => 'required|exists:'.CourseEvaluation::TABLE.',id',
      'value' => 'required|integer|min:0|max:100',
    ]);
    $validator->validate();

    $student_id = $this->data['student_id'];
    $student = Student::find($student_id);
    $course_ids = $student->courses()->get()->pluck('id')->all();
    $course_evaluation_ids = CourseEvaluation::whereIn('course_id', $course_ids)->get()->pluck('id')->all();
    $validator = LaravelValidator::make($this->data, [
      'evaluation_id' => Rule::in($course_evaluation_ids),
    ]);
    $validator->validate();
    
    $student_id = $this->data['student_id'];
    $evaluation_id = $this->data['evaluation_id'];
    $validator = LaravelValidator::make($this->data, [
      'evaluation_id' => [
        Rule::unique(StudentEvaluation::TABLE)->where(function ($query) use ($student_id, $evaluation_id) {
          return $query->where([
            'student_id' => $student_id,
            'evaluation_id' => $evaluation_id,
          ]);
        })
      ],
    ]);
    $validator->validate();
  }
}