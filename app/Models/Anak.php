<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
  use HasFactory;

  public function anakUser()
  {
    return $this->hasOne(User::class);
  }
}
