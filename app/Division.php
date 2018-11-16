<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use SoftDeletes;
    protected $fillable = ['division_name'];
    protected $dates = ['deleted_at'];
}
