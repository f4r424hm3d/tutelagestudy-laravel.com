<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTypeYearPaper extends Model
{
  use HasFactory;
  public function examTypeYear()
  {
    return $this->hasOne(ExamTypeYear::class, 'id', 'exam_type_year_id');
  }
  public function contents()
  {
    return $this->hasMany(PaperContent::class, 'paper_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(PaperContent::class, 'paper_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(PaperFaq::class, 'paper_id', 'id');
  }
}
