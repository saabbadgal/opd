<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DoctorDetail extends Model
{
    protected $fillable = ['dr_id', 'specailist', 'experience', 'dob', 'matarial_staus', 'domarriage', 'education'];
}
