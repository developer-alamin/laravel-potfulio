<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cvModel extends Model
{
    public $table = "cv";
    public $primiaryKey = 'id';
    public $incrementing = true;
    public $KeyType = 'int';
    public $timestamps = false;
}
