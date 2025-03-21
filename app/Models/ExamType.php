<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
  use HasFactory;
  public function years()
  {
    return $this->hasMany(ExamTypeYear::class, 'exam_type_id');
  }
  public function contents()
  {
    return $this->hasMany(ExamTypeContent::class, 'exam_type_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(ExamTypeContent::class, 'exam_type_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(ExamTypeFaq::class, 'exam_type_id', 'id');
  }
}
