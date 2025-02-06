<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
  use HasFactory;
  protected $guarded = [];
  public function getUser()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }
  public function universities()
  {
    return $this->hasMany(University::class, 'destination_id', 'id');
  }

  public function contents()
  {
    return $this->hasMany(DestinationPageContent::class, 'page_id')->orderBy('priority', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(DestinationPageContent::class, 'page_id', 'id')->orderBy('priority', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(DestinationPageFaq::class, 'page_id', 'id');
  }
}
