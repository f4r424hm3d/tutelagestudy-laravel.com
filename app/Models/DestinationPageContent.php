<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPageContent extends Model
{
  use HasFactory;
  public function getTab()
  {
    return $this->hasOne(DestinationPageTabs::class, 'id', 'tab_id');
  }
  public function childs()
  {
    return $this->hasMany(DestinationPageContent::class, 'parent_id', 'id');
  }
  public function parent()
  {
    return $this->hasOne(DestinationPageContent::class, 'id', 'parent_id');
  }
  public function childContents()
  {
    return $this->hasMany(DestinationPageContent::class, 'parent_id', 'id')->orderBy('priority', 'asc')->where('parent_id', '!=', null);
  }
}
