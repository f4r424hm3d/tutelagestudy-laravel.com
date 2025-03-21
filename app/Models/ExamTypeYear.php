<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTypeYear extends Model
{
  use HasFactory;
  public function examType()
  {
    return $this->hasOne(ExamType::class, 'id', 'exam_type_id');
  }
  public function papers()
  {
    return $this->hasMany(ExamTypeYearPaper::class, 'exam_type_year_id');
  }
  public function contents()
  {
    return $this->hasMany(ExamTypeYearContent::class, 'exam_type_year_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(ExamTypeYearContent::class, 'exam_type_year_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(ExamTypeYearFaq::class, 'exam_type_year_id', 'id');
  }
}
