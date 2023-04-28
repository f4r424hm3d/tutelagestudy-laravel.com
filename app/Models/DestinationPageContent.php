<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPageContent extends Model
{
  use HasFactory;
  public function getTab()
  {
    return $this->hasOne(DestinationPageTabs::class,'id','tab_id');
  }
}
