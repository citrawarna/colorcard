<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $fillable = ['colorcard_id', 'qty', 'descriptions', 'date'];

    public function color_cards(){
        return $this->hasMany('App\ColorCard');
    }
}

