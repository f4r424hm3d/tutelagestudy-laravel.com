<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
  use HasFactory;
  protected $guarded = [];
  public function getInstType()
  {
    return $this->hasOne(InstituteType::class, 'id', 'institute_type');
  }
  public function getAuthor()
  {
    return $this->hasOne(Author::class, 'id', 'author_id');
  }
  public function getDestination()
  {
    return $this->hasOne(Destination::class, 'id', 'destination_id');
  }

  public function contents()
  {
    return $this->hasMany(UniversityOverview::class, 'university_id')->orderBy('position', 'asc');
  }
  public function parentContents()
  {
    return $this->hasMany(UniversityOverview::class, 'university_id', 'id')->orderBy('position', 'asc')->where('parent_id', null);
  }
}
