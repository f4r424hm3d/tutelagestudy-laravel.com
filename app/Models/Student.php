<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
  use Notifiable;
  use HasFactory;
  protected $guarded = [];

  protected $fillable = [
    'name',
    'email',
    'password',
    'google_id',
  ];
  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }
}
