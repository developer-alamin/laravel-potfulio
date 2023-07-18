<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cotactModel extends Model
{
    public $table = "contact";
    public $primiaryKey = 'id';
    public $incrementing = true;
    public $KeyType = 'int';
    public $timestamps = true;
}
