<?php

namespace App\Services\Teachers\CreateTeacher;

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
      'dni' => 'required|unique:'.Teacher::TABLE,
      'name' => 'required|string|max:30',
      'surname' => 'required|string|max:30',
    ]);
    $validator->validate();
  }
}