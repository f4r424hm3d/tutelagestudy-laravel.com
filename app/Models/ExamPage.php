<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPage extends Model
{
  use HasFactory;
  public function getAuthor()
  {
    return $this->hasOne(Author::class,'id','author_id');
  }
}
