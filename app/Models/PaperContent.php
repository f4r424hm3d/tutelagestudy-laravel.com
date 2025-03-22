<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperContent extends Model
{
  use HasFactory;
  public function childs()
  {
    return $this->hasMany(PaperContent::class, 'parent_id', 'id');
  }
  public function parent()
  {
    return $this->hasOne(PaperContent::class, 'id', 'parent_id');
  }
  public function childContents()
  {
    return $this->hasMany(PaperContent::class, 'parent_id', 'id')->orderBy('position', 'asc')->where('parent_id', '!=', null);
  }
}
