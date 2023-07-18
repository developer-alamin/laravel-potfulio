<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogModel extends Model
{
    public $table = "blog";
    public $primiaryKey = 'id';
    public $incrementing = true;
    public $KeyType = 'int';
    public $timestamps = false;
}
