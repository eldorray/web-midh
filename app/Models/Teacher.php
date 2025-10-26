<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['photo', 'name', 'subject', 'instagram', 'facebook', 'twitter'];
}
