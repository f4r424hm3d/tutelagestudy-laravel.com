<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
  use HasFactory;
  public function blogs()
  {
    return $this->hasMany(News::class, 'cate_id', 'id');
  }
}
