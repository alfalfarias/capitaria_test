<?php

namespace App\Services\Teachers\DeleteTeacher;

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
  }
}