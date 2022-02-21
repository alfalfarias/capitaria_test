<?php

namespace App\Services\Teachers\UpdateTeacher;

use App\Models\Teachers\Teacher;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required|exists:'.Teacher::TABLE,
    ]);
    $validator->validate();

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required',
      'dni' => [
        Rule::unique(Teacher::TABLE)->ignore($data['id']),
        'string|max:30'
      ],
      'name' => 'string|max:30',
      'surname' => 'string|max:30',
    ]);
    $validator->validate();
  }
}