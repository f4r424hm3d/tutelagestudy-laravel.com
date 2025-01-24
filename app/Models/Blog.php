<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  use HasFactory;
  public function getCategory()
  {
    return $this->hasOne(BlogCategory::class, 'id', 'cate_id');
  }
  public function getAuthor()
  {
    return $this->hasOne(Author::class, 'id', 'author_id');
  }
}
