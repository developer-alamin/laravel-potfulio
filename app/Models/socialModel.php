<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialModel extends Model
{
  	 public $table = "social";
    public $primiaryKey = 'id';
    public $incrementing = true;
    public $KeyType = 'int';
    public $timestamps = false;
}
