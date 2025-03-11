<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPaper extends Model
{
  use HasFactory;
  public function exam()
  {
    return $this->hasOne(ExamType::class, 'id', 'exam_type_id');
  }
}
