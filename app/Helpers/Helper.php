<?php
use Illuminate\Support\Facades\DB;

function stockReceive($cc_id){
    $receives = DB::table('receives')->where('colorcard_id', $cc_id)->sum('qty');
    return $receives;
}

function stockSend($cc_id){
    $sends = DB::table('sends')->where('colorcard_id', $cc_id)->sum('amount');
    return $sends;
}

function calculateStock($cc_id){
    return stockReceive($cc_id) - stockSend($cc_id);
}

?>