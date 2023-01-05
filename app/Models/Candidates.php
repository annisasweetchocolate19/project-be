<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Candidates extends Model
{
    use HasUserStamps;
     // field isian
     public $fillable = ['job_id', 'name', 'email', 'phone', 'year'];
     // fitur create, update, delete aktif
     public $userstamps = true;
     public $softUserstamps = true;
     public $timestamps = true;
     public $softDeletes = true;
}
