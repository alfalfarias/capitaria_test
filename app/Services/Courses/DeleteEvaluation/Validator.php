<?php

namespace App\Services\Courses\DeleteEvaluation;

use App\Models\Courses\Evaluation;
use Illuminate\Support\Facades\Validator as LaravelValidator;
use Illuminate\Validation\Rule;

class Validator
{
  public $data;

  public function __construct(array $data = [])
  {
    $this->data = $data;

    $validator = LaravelValidator::make($this->data, [
      'id' => 'required|exists:'.Evaluation::TABLE,
    ]);
    $validator->validate();
  }
}