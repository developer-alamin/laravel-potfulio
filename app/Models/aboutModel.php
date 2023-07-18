<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutModel extends Model
{
    public $table = "about";
    public $primiaryKey = 'id';
    public $incrementing = true;
    public $KeyType = 'int';
    public $timestamps = false;
}
