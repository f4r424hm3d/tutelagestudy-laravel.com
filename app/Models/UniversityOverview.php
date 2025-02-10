<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityOverview extends Model
{
  use HasFactory;
  protected $guarded = [];
  public function childs()
  {
    return $this->hasMany(UniversityOverview::class, 'parent_id', 'id');
  }
  public function parent()
  {
    return $this->hasOne(UniversityOverview::class, 'id', 'parent_id');
  }
  public function childContents()
  {
    return $this->hasMany(UniversityOverview::class, 'parent_id', 'id')->orderBy('position', 'asc')->where('parent_id', '!=', null);
  }
}
