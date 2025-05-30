<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;
  protected $guarded = [];
  public function contents()
  {
    return $this->hasMany(ServiceContent::class, 'service_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(ServiceContent::class, 'service_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
  public function faqs()
  {
    return $this->hasMany(ServiceFaq::class, 'service_id', 'id');
  }
}
