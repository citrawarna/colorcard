<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorCard extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','cc_name', 'category_id', 'tag'];
    protected $dates = ['deleted_at'];

    
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function receive(){
        return $this->belongsTo('App\Receive');
    }
}

