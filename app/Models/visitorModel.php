<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class visitorModel extends Model
{
     use HasFactory, Notifiable;
    protected $table = "visitors";
    protected $fillable = [
        'visitor',
        'date'
    ];
}
	