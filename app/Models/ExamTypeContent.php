<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTypeContent extends Model
{
  use HasFactory;
  public function childs()
  {
    return $this->hasMany(ExamTypeContent::class, 'parent_id', 'id');
  }
  public function parent()
  {
    return $this->hasOne(ExamTypeContent::class, 'id', 'parent_id');
  }
  public function childContents()
  {
    return $this->hasMany(ExamTypeContent::class, 'parent_id', 'id')->orderBy('position', 'asc')->where('parent_id', '!=', null);
  }
}
