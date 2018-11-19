<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairStock extends Model
{
    protected $fillable = ['colorcard_id', 'division_id', 'date', 'difference', 'type', 'reason'];
}
