<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Send extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','division_id', 'colorcard_id', 'amount', 'date', 'description'];
    protected $dates = ['deleted_at'];

    public function color_cards_send(){
        return $this->belongsTo('App\ColorCard', 'foreign_key');
    }
}
